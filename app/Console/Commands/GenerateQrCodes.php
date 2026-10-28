<?php

namespace App\Console\Commands;

use App\Services\QrCodeService;
use Illuminate\Console\Command;

class GenerateQrCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'qr:generate {--verify : Also decode and verify the generated QR code}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate print-ready high-resolution PNG, SVG and branded ISHANAA packaging label QR codes';

    /**
     * Execute the console command.
     */
    public function handle(QrCodeService $service): int
    {
        $this->info("=== ISHANAA QR Code Generation ===");
        $this->line("Target URL: " . QrCodeService::TARGET_URL);

        $result = $service->generateAll();

        $this->newLine();
        $this->info("✓ Assets generated successfully in storage and public directories:");
        $this->table(
            ['Asset Type', 'File Path', 'Size (KB)'],
            [
                ['Raw High-Res PNG', $result['raw_png']['path'], round($result['raw_png']['size_bytes'] / 1024, 2)],
                ['Raw Vector SVG', $result['raw_svg']['path'], round($result['raw_svg']['size_bytes'] / 1024, 2)],
                ['Branded Packaging PNG', $result['branded_png']['path'], round($result['branded_png']['size_bytes'] / 1024, 2)],
                ['Branded Packaging SVG', $result['branded_svg']['path'], round($result['branded_svg']['size_bytes'] / 1024, 2)],
            ]
        );

        $this->newLine();
        $this->info("✓ Decoding & Verification:");
        $verify = $result['verification'];
        if ($verify['success'] ?? false) {
            $this->info("  [PASSED] Decoded URL: " . $verify['decoded_url']);
            $this->info("  [PASSED] Exactly matches: " . $verify['target_url']);
        } else {
            $this->error("  [FAILED] Decoding error: " . ($verify['error'] ?? 'Unknown mismatch'));
            return Command::FAILURE;
        }

        $this->newLine();
        $this->info("Public URLs for download/preview:");
        $this->line(" - " . $result['raw_png']['url']);
        $this->line(" - " . $result['raw_svg']['url']);
        $this->line(" - " . $result['branded_png']['url']);
        $this->line(" - " . $result['branded_svg']['url']);

        return Command::SUCCESS;
    }
}
