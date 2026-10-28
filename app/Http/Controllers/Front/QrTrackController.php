<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\QrScan;
use App\Services\QrCodeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QrTrackController extends Controller
{
    /**
     * Handle incoming physical QR code scan requests.
     * Records scan analytics and redirects visitor to the homepage.
     *
     * URL: https://ishanaa.in/qr
     */
    public function track(Request $request, QrCodeService $qrService): RedirectResponse
    {
        try {
            QrScan::ensureTableExists();

            // Extract device intelligence, privacy hash & campaign attribution
            $clientData = $qrService->detectClient($request);

            // Record every scan in database
            QrScan::create([
                'visitor_hash' => $clientData['visitor_hash'],
                'source'       => $clientData['source'] ?? 'packaging',
                'campaign'     => $clientData['campaign'] ?? null,
                'medium'       => $clientData['medium'] ?? null,
                'device_type'  => $clientData['device_type'] ?? null,
                'platform'     => $clientData['platform'] ?? null,
                'browser'      => $clientData['browser'] ?? null,
                'user_agent'   => $clientData['user_agent'] ?? null,
                'referrer'     => $clientData['referrer'] ?? null,
                'scanned_at'   => now(),
            ]);
        } catch (\Throwable $e) {
            // Safe fallback: log error without exposing any technical issues to the customer
            Log::error('QR Scan tracking failed to record: ' . $e->getMessage(), [
                'exception' => $e,
                'ip_hash'   => isset($clientData['visitor_hash']) ? substr($clientData['visitor_hash'], 0, 8) : null,
            ]);
        }

        // Forward query params (like UTM tags) to homepage if present, otherwise clean redirect
        $queryParams = $request->query();
        if (!empty($queryParams)) {
            return redirect()->to(url('/') . '?' . http_build_query($queryParams));
        }

        return redirect()->to(url('/'));
    }
}
