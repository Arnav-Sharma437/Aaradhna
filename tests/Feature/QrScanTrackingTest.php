<?php

namespace Tests\Feature;

use App\Models\QrScan;
use App\Models\User;
use App\Services\QrCodeService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class QrScanTrackingTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test 1: Opening /qr records a scan in the database and redirects to the homepage.
     */
    public function test_qr_tracking_redirects_to_homepage_and_creates_database_record(): void
    {
        $initialCount = QrScan::count();

        $response = $this->get('/qr', [
            'User-Agent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Mobile/15E148 Safari/604.1',
        ]);

        $response->assertRedirect('/');
        $this->assertEquals($initialCount + 1, QrScan::count());

        $latest = QrScan::latest('id')->first();
        $this->assertNotNull($latest);
        $this->assertEquals('packaging', $latest->source);
        $this->assertEquals('mobile', $latest->device_type);
        $this->assertEquals('iOS', $latest->platform);
        $this->assertEquals('Apple Safari', $latest->browser);
        $this->assertNotEmpty($latest->visitor_hash);
    }

    /**
     * Test 2: Query parameters like ?source=box&campaign=diwali are tracked and forwarded.
     */
    public function test_qr_tracking_preserves_campaign_and_source_query_parameters(): void
    {
        $response = $this->get('/qr?source=flyer&campaign=festive-2026&utm_medium=print', [
            'User-Agent' => 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.43 Mobile Safari/537.36',
        ]);

        $response->assertRedirect('/?source=flyer&campaign=festive-2026&utm_medium=print');

        $latest = QrScan::latest('id')->first();
        $this->assertEquals('flyer', $latest->source);
        $this->assertEquals('festive-2026', $latest->campaign);
        $this->assertEquals('print', $latest->medium);
        $this->assertEquals('mobile', $latest->device_type);
        $this->assertEquals('Android', $latest->platform);
    }

    /**
     * Test 3: Repeat scans from the same visitor increase the total count while sharing visitor_hash.
     */
    public function test_repeat_scans_increment_total_count_while_maintaining_unique_visitor_hash(): void
    {
        $headers = [
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36',
            'REMOTE_ADDR' => '203.0.113.195',
        ];

        $startCount = QrScan::count();

        // First scan
        $this->get('/qr', $headers)->assertRedirect('/');
        $firstScan = QrScan::latest('id')->first();

        // Second scan from same visitor
        $this->get('/qr', $headers)->assertRedirect('/');
        $secondScan = QrScan::latest('id')->first();

        $this->assertEquals($startCount + 2, QrScan::count());
        $this->assertEquals($firstScan->visitor_hash, $secondScan->visitor_hash);
        $this->assertNotEquals($firstScan->id, $secondScan->id);
    }

    /**
     * Test 4: Unauthenticated visitors cannot access admin QR analytics.
     */
    public function test_admin_qr_analytics_requires_authentication(): void
    {
        $response = $this->get('/admin/qr-analytics');
        $response->assertRedirect(route('admin.login'));
    }

    /**
     * Test 5: Authenticated admin can view QR analytics dashboard.
     */
    public function test_authenticated_admin_can_view_qr_analytics(): void
    {
        $admin = User::create([
            'name' => 'Store Administrator',
            'email' => 'admin_test_' . time() . '@ishanaa.in',
            'password' => bcrypt('password123'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->get('/admin/qr-analytics');
        $response->assertStatus(200);
        $response->assertSee('QR Scan Tracking &amp; Analytics', false);
        $response->assertSee('https://ishanaa.in/qr');
        $response->assertSee('Download QR (.PNG)');
    }

    /**
     * Test 6: Generated QR codes decode to exactly https://ishanaa.in/qr.
     */
    public function test_qr_code_decodes_to_exact_target_url(): void
    {
        $service = new QrCodeService();
        $assets = $service->generateAll();

        $this->assertFileExists($assets['raw_png']['path']);
        $this->assertFileExists($assets['raw_svg']['path']);
        $this->assertFileExists($assets['branded_png']['path']);
        $this->assertFileExists($assets['branded_svg']['path']);

        $verify = $service->verifyDecoding($assets['raw_png']['path']);
        $this->assertTrue($verify['success']);
        $this->assertEquals('https://ishanaa.in/qr', $verify['decoded_url']);
    }

    /**
     * Test 7: Download endpoints return valid binary download responses.
     */
    public function test_qr_download_endpoints_return_valid_binary_files(): void
    {
        $admin = User::create([
            'name' => 'Store Administrator',
            'email' => 'admin_dl_' . time() . '@ishanaa.in',
            'password' => bcrypt('password123'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        $this->actingAs($admin)->get('/admin/qr-analytics/download/png')
            ->assertStatus(200)
            ->assertHeader('content-type', 'image/png');

        $this->actingAs($admin)->get('/admin/qr-analytics/download/svg')
            ->assertStatus(200)
            ->assertHeader('content-type', 'image/svg+xml');

        $this->actingAs($admin)->get('/admin/qr-analytics/download/label-png')
            ->assertStatus(200)
            ->assertHeader('content-type', 'image/png');

        $this->actingAs($admin)->get('/admin/qr-analytics/download/label-svg')
            ->assertStatus(200)
            ->assertHeader('content-type', 'image/svg+xml');
    }
}
