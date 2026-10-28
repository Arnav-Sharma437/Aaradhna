<?php

namespace App\Services;

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use chillerlan\QRCode\Common\EccLevel;
use chillerlan\QRCode\Common\Version;
use chillerlan\QRCode\Output\QRGdImagePNG;
use chillerlan\QRCode\Output\QRMarkupSVG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class QrCodeService
{
    /**
     * Exact permanent tracking URL required for product packaging and marketing.
     */
    public const TARGET_URL = 'https://ishanaa.in/qr';

    /**
     * Relative storage directory where print-ready assets are stored.
     */
    public const STORAGE_SUBDIR = 'qr';

    /**
     * Get the absolute path to the storage directory.
     */
    public static function getStorageDir(): string
    {
        return storage_path('app/public/' . self::STORAGE_SUBDIR);
    }

    /**
     * Get the absolute path to the public directory.
     */
    public static function getPublicDir(): string
    {
        return public_path('storage/' . self::STORAGE_SUBDIR);
    }

    /**
     * Generate all QR code variations (PNG, SVG, Branded PNG, Branded SVG)
     * and persist them to both storage and public directories.
     */
    public function generateAll(): array
    {
        $storageDir = self::getStorageDir();
        $publicDir = self::getPublicDir();

        if (!File::exists($storageDir)) {
            File::makeDirectory($storageDir, 0755, true);
        }
        if (!File::exists($publicDir)) {
            File::makeDirectory($publicDir, 0755, true);
        }

        // 1. Raw High-Resolution Print-Ready QR PNG (1200x1200 approx)
        $rawPng = $this->generateRawPng();
        $rawPngPath = $storageDir . '/ishanaa-qr-code.png';
        File::put($rawPngPath, $rawPng);
        File::put($publicDir . '/ishanaa-qr-code.png', $rawPng);

        // 2. Raw Infinite-Scale Vector SVG
        $rawSvg = $this->generateRawSvg();
        $rawSvgPath = $storageDir . '/ishanaa-qr-code.svg';
        File::put($rawSvgPath, $rawSvg);
        File::put($publicDir . '/ishanaa-qr-code.svg', $rawSvg);

        // 3. Premium ISHANAA-Branded Packaging Card Label (PNG)
        $brandedPng = $this->generateBrandedPng($rawPng);
        $brandedPngPath = $storageDir . '/ishanaa-qr-label-branded.png';
        File::put($brandedPngPath, $brandedPng);
        File::put($publicDir . '/ishanaa-qr-label-branded.png', $brandedPng);

        // 4. Premium ISHANAA-Branded Packaging Card Label (SVG)
        $brandedSvg = $this->generateBrandedSvg($rawSvg);
        $brandedSvgPath = $storageDir . '/ishanaa-qr-label-branded.svg';
        File::put($brandedSvgPath, $brandedSvg);
        File::put($publicDir . '/ishanaa-qr-label-branded.svg', $brandedSvg);

        // 5. Staging / Environment Test QR (Directly scan with phone on current server)
        $stagingTargetUrl = url('/qr');
        $stagingPng = $this->generateRawPng($stagingTargetUrl, 16);
        $stagingPngPath = $storageDir . '/ishanaa-staging-test-qr.png';
        File::put($stagingPngPath, $stagingPng);
        File::put($publicDir . '/ishanaa-staging-test-qr.png', $stagingPng);

        // Verify decoding
        $verification = $this->verifyDecoding($rawPngPath);

        return [
            'raw_png' => [
                'path' => $rawPngPath,
                'url' => asset('storage/qr/ishanaa-qr-code.png'),
                'size_bytes' => strlen($rawPng),
            ],
            'raw_svg' => [
                'path' => $rawSvgPath,
                'url' => asset('storage/qr/ishanaa-qr-code.svg'),
                'size_bytes' => strlen($rawSvg),
            ],
            'branded_png' => [
                'path' => $brandedPngPath,
                'url' => asset('storage/qr/ishanaa-qr-label-branded.png'),
                'size_bytes' => strlen($brandedPng),
            ],
            'branded_svg' => [
                'path' => $brandedSvgPath,
                'url' => asset('storage/qr/ishanaa-qr-label-branded.svg'),
                'size_bytes' => strlen($brandedSvg),
            ],
            'staging_png' => [
                'path' => $stagingPngPath,
                'url' => asset('storage/qr/ishanaa-staging-test-qr.png'),
                'size_bytes' => strlen($stagingPng),
            ],
            'verification' => $verification,
            'target_url' => self::TARGET_URL,
            'staging_url' => $stagingTargetUrl,
        ];
    }

    /**
     * Generate raw high-resolution PNG using chillerlan QR with GD.
     * High Error Correction Level H (~30%) with quiet zone 4.
     */
    public function generateRawPng(?string $url = null, int $scale = 24): string
    {
        $target = $url ?: self::TARGET_URL;

        $options = new QROptions();
        $options->version = Version::AUTO;
        $options->eccLevel = EccLevel::H;
        $options->outputInterface = QRGdImagePNG::class;
        $options->scale = $scale;
        $options->addQuietzone = true;
        $options->quietzoneSize = 4;
        $options->outputBase64 = false;

        $qrcode = new QRCode($options);
        return $qrcode->render($target);
    }

    /**
     * Generate infinite-scale vector SVG.
     */
    public function generateRawSvg(?string $url = null): string
    {
        $target = $url ?: self::TARGET_URL;

        $options = new QROptions();
        $options->version = Version::AUTO;
        $options->eccLevel = EccLevel::H;
        $options->outputInterface = QRMarkupSVG::class;
        $options->scale = 10;
        $options->addQuietzone = true;
        $options->quietzoneSize = 4;
        $options->outputBase64 = false;

        $qrcode = new QRCode($options);
        return $qrcode->render($target);
    }

    /**
     * Generate premium ISHANAA branded packaging label in high-res PNG (1200 x 1650 px).
     */
    public function generateBrandedPng(?string $rawQrPng = null): string
    {
        if ($rawQrPng === null) {
            $rawQrPng = $this->generateRawPng(20);
        }

        $cardW = 1200;
        $cardH = 1650;
        $card = imagecreatetruecolor($cardW, $cardH);
        imagealphablending($card, true);
        imagesavealpha($card, true);

        // Color Palette
        $bg = imagecolorallocate($card, 255, 253, 249); // Luxury off-white #FFFDF9
        $dark = imagecolorallocate($card, 26, 26, 26);    // Rich Charcoal #1A1A1A
        $gold = imagecolorallocate($card, 168, 105, 17);  // ISHANAA Theme Dark Gold #A86911
        $goldLight = imagecolorallocate($card, 213, 162, 61); // Amber Accent #D5A23D
        $grayMuted = imagecolorallocate($card, 100, 100, 100);
        $white = imagecolorallocate($card, 255, 255, 255);

        // Fill background
        imagefill($card, 0, 0, $bg);

        // Double Border
        $padOuter = 40;
        $padInner = 56;
        imagesetthickness($card, 3);
        imagerectangle($card, $padOuter, $padOuter, $cardW - $padOuter, $cardH - $padOuter, $gold);
        imagesetthickness($card, 1);
        imagerectangle($card, $padInner, $padInner, $cardW - $padInner, $cardH - $padInner, $goldLight);

        // Decorative corner accents
        $cornerLen = 30;
        foreach ([
            [$padOuter, $padOuter, 1, 1],
            [$cardW - $padOuter, $padOuter, -1, 1],
            [$padOuter, $cardH - $padOuter, 1, -1],
            [$cardW - $padOuter, $cardH - $padOuter, -1, -1]
        ] as [$cx, $cy, $dx, $dy]) {
            imagefilledrectangle($card, min($cx, $cx + $dx * $cornerLen), min($cy, $cy + $dy * 4), max($cx, $cx + $dx * $cornerLen), max($cy, $cy + $dy * 4), $gold);
            imagefilledrectangle($card, min($cx, $cx + $dx * 4), min($cy, $cy + $dy * $cornerLen), max($cx, $cx + $dx * 4), max($cy, $cy + $dy * $cornerLen), $gold);
        }

        // Fonts
        $agathoBold = public_path('assets/fonts/agatho/Agatho-Bold.otf');
        $agathoMed = public_path('assets/fonts/agatho/Agatho-Medium.otf');
        $agathoReg = public_path('assets/fonts/agatho/Agatho-Regular.otf');
        $useAgatho = file_exists($agathoBold);

        // Top Brand Header: ISHANAA
        if ($useAgatho) {
            $this->drawCenteredTtfText($card, "ISHANAA", $agathoBold, 44, 180, $dark);
            $this->drawCenteredTtfText($card, "PURE VEDIC LIVING", $agathoMed, 18, 230, $gold);
            
            // Thin golden divider
            imagesetthickness($card, 1);
            imageline($card, 450, 270, 750, 270, $goldLight);

            // Call to Action
            $this->drawCenteredTtfText($card, "SCAN TO VISIT", $agathoBold, 32, 335, $dark);
            $this->drawCenteredTtfText($card, "Point phone camera to explore sacred pooja samagri", $agathoReg, 15, 380, $grayMuted);
        } else {
            // Fallback
            imagestring($card, 5, ($cardW - 120) / 2, 160, "ISHANAA", $dark);
            imagestring($card, 4, ($cardW - 140) / 2, 210, "SCAN TO VISIT", $gold);
        }

        // Embed the QR Code
        $qrImg = imagecreatefromstring($rawQrPng);
        if ($qrImg) {
            $qrOrigW = imagesx($qrImg);
            $qrOrigH = imagesy($qrImg);
            $targetQrSize = 780;
            $qrX = (int)(($cardW - $targetQrSize) / 2);
            $qrY = 430;

            // QR Frame background
            imagefilledrectangle($card, $qrX - 16, $qrY - 16, $qrX + $targetQrSize + 16, $qrY + $targetQrSize + 16, $white);
            imagesetthickness($card, 2);
            imagerectangle($card, $qrX - 16, $qrY - 16, $qrX + $targetQrSize + 16, $qrY + $targetQrSize + 16, $goldLight);

            imagecopyresampled($card, $qrImg, $qrX, $qrY, 0, 0, $targetQrSize, $targetQrSize, $qrOrigW, $qrOrigH);
            imagedestroy($qrImg);
        }

        // Bottom Brand Elements: URL & Guarantees
        if ($useAgatho) {
            $this->drawCenteredTtfText($card, "ISHANAA.IN", $agathoBold, 42, 1340, $dark);
            $this->drawCenteredTtfText($card, "100% Charcoal-Free • Pure Temple Flowers • Zero Bamboo", $agathoMed, 16, 1400, $gold);
            
            // Bottom small badge
            imagesetthickness($card, 1);
            imageline($card, 480, 1440, 720, 1440, $goldLight);
            $this->drawCenteredTtfText($card, "Authentic Vedic Puja Essentials Handcrafted for Divine Living", $agathoReg, 14, 1490, $grayMuted);
        } else {
            imagestring($card, 5, ($cardW - 120) / 2, 1320, "ISHANAA.IN", $dark);
        }

        ob_start();
        imagepng($card, null, 8);
        $finalPng = ob_get_clean();
        imagedestroy($card);

        return $finalPng;
    }

    /**
     * Generate premium ISHANAA branded packaging label in vector SVG format.
     */
    public function generateBrandedSvg(?string $rawSvg = null): string
    {
        if ($rawSvg === null) {
            $rawSvg = $this->generateRawSvg();
        }

        // Strip xml header & svg wrapper from inner qr svg
        $innerSvgContent = preg_replace('/<\?xml.*?\?>/s', '', $rawSvg);
        $innerSvgContent = preg_replace('/<svg[^>]*>/', '', $innerSvgContent);
        $innerSvgContent = str_replace('</svg>', '', $innerSvgContent);

        return <<<SVG
<?xml version="1.0" encoding="UTF-8"?>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 1650" width="1200" height="1650">
    <defs>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;900&amp;family=Plus+Jakarta+Sans:wght@500;700&amp;display=swap');
            .brand-heading { font-family: 'Cinzel', serif; font-weight: 900; fill: #1A1A1A; }
            .brand-sub { font-family: 'Cinzel', serif; font-weight: 700; fill: #A86911; letter-spacing: 4px; }
            .brand-body { font-family: 'Plus Jakarta Sans', sans-serif; fill: #666666; }
            .brand-url { font-family: 'Cinzel', serif; font-weight: 900; fill: #1A1A1A; letter-spacing: 3px; }
        </style>
    </defs>

    <!-- Card Background -->
    <rect width="1200" height="1650" fill="#FFFDF9"/>

    <!-- Double Border Frame -->
    <rect x="40" y="40" width="1120" height="1570" fill="none" stroke="#A86911" stroke-width="3"/>
    <rect x="56" y="56" width="1088" height="1538" fill="none" stroke="#D5A23D" stroke-width="1.5"/>

    <!-- Corner Decorative Accents -->
    <path d="M40 70 L40 40 L70 40" stroke="#A86911" stroke-width="6" fill="none"/>
    <path d="M1160 70 L1160 40 L1130 40" stroke="#A86911" stroke-width="6" fill="none"/>
    <path d="M40 1580 L40 1610 L70 1610" stroke="#A86911" stroke-width="6" fill="none"/>
    <path d="M1160 1580 L1160 1610 L1130 1610" stroke="#A86911" stroke-width="6" fill="none"/>

    <!-- Header Section -->
    <text x="600" y="180" text-anchor="middle" class="brand-heading" font-size="52">ISHANAA</text>
    <text x="600" y="225" text-anchor="middle" class="brand-sub" font-size="20">PURE VEDIC LIVING</text>
    <line x1="450" y1="260" x2="750" y2="260" stroke="#D5A23D" stroke-width="1.5"/>

    <!-- Call to Action -->
    <text x="600" y="330" text-anchor="middle" class="brand-heading" font-size="34" fill="#1A1A1A" letter-spacing="3">SCAN TO VISIT</text>
    <text x="600" y="370" text-anchor="middle" class="brand-body" font-size="18">Point phone camera to explore sacred pooja samagri</text>

    <!-- QR Code Container Box -->
    <rect x="200" y="420" width="800" height="800" fill="#FFFFFF" stroke="#D5A23D" stroke-width="2" rx="8"/>
    
    <!-- Embedded Scalable QR Vector -->
    <g transform="translate(215, 435) scale(0.96)">
        $innerSvgContent
    </g>

    <!-- Footer Section -->
    <text x="600" y="1335" text-anchor="middle" class="brand-url" font-size="44">ISHANAA.IN</text>
    <text x="600" y="1385" text-anchor="middle" class="brand-sub" font-size="19" fill="#A86911">100% CHARCOAL-FREE • PURE TEMPLE FLOWERS • ZERO BAMBOO</text>
    <line x1="480" y1="1425" x2="720" y2="1425" stroke="#D5A23D" stroke-width="1.5"/>
    <text x="600" y="1475" text-anchor="middle" class="brand-body" font-size="17">Authentic Vedic Puja Essentials Handcrafted for Divine Living</text>
</svg>
SVG;
    }

    /**
     * Decode a QR image to verify it reads back exactly to https://ishanaa.in/qr.
     */
    public function verifyDecoding(string $pngPath): array
    {
        try {
            if (!File::exists($pngPath)) {
                return ['success' => false, 'error' => 'File does not exist: ' . $pngPath];
            }

            $blob = File::get($pngPath);
            $reader = (new QRCode)->readFromBlob($blob);
            $decoded = (string)$reader;

            $matches = ($decoded === self::TARGET_URL);

            return [
                'success' => $matches,
                'decoded_url' => $decoded,
                'target_url' => self::TARGET_URL,
                'match' => $matches,
            ];
        } catch (\Throwable $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
                'target_url' => self::TARGET_URL,
            ];
        }
    }

    /**
     * Inspect incoming HTTP request and extract device intelligence + privacy hash.
     */
    public function detectClient(Request $request): array
    {
        $userAgent = $request->userAgent() ?? '';
        $ip = $request->ip() ?? '0.0.0.0';

        // 1. Privacy-conscious unique visitor hash (SHA-256)
        // Combines IP, User Agent, and Laravel Application Key. Raw IP is never stored.
        $appKey = config('app.key') ?: 'ishanaa-qr-salt-fallback';
        $visitorHash = hash('sha256', $ip . '|' . $userAgent . '|' . $appKey);

        // 2. Device Type Detection
        $deviceType = 'desktop';
        if (preg_match('/(bot|crawler|spider|crawling|slurp|facebookexternalhit|whatsapp|googlebot|bingbot|yahoo)/i', $userAgent)) {
            $deviceType = 'bot';
        } elseif (preg_match('/(ipad|tablet|(android(?!.*mobile))|kindle|playbook)/i', $userAgent)) {
            $deviceType = 'tablet';
        } elseif (preg_match('/(iphone|ipod|android.*mobile|blackberry|iemobile|opera mini|mobile)/i', $userAgent)) {
            $deviceType = 'mobile';
        }

        // 3. Operating System / Platform
        $platform = 'Other';
        if (preg_match('/iphone|ipad|ipod/i', $userAgent)) {
            $platform = 'iOS';
        } elseif (preg_match('/android/i', $userAgent)) {
            $platform = 'Android';
        } elseif (preg_match('/windows nt 10\.0/i', $userAgent)) {
            $platform = 'Windows 10/11';
        } elseif (preg_match('/windows nt/i', $userAgent)) {
            $platform = 'Windows';
        } elseif (preg_match('/macintosh|mac os x/i', $userAgent)) {
            $platform = 'macOS';
        } elseif (preg_match('/cros/i', $userAgent)) {
            $platform = 'Chrome OS';
        } elseif (preg_match('/linux/i', $userAgent)) {
            $platform = 'Linux';
        }

        // 4. Browser Detection
        $browser = 'Other';
        if (preg_match('/samsungbrowser/i', $userAgent)) {
            $browser = 'Samsung Internet';
        } elseif (preg_match('/edg|edge/i', $userAgent)) {
            $browser = 'Microsoft Edge';
        } elseif (preg_match('/opr|opera/i', $userAgent)) {
            $browser = 'Opera';
        } elseif (preg_match('/chrome|crios/i', $userAgent) && !preg_match('/edg/i', $userAgent)) {
            $browser = 'Google Chrome';
        } elseif (preg_match('/firefox|fxios/i', $userAgent)) {
            $browser = 'Mozilla Firefox';
        } elseif (preg_match('/safari/i', $userAgent) && !preg_match('/chrome|crios/i', $userAgent)) {
            $browser = 'Apple Safari';
        } elseif (preg_match('/instagram/i', $userAgent)) {
            $browser = 'Instagram In-App';
        } elseif (preg_match('/fbav|fban/i', $userAgent)) {
            $browser = 'Facebook In-App';
        } elseif (preg_match('/whatsapp/i', $userAgent)) {
            $browser = 'WhatsApp In-App';
        }

        // 5. Campaign / Attribution Parameters
        $source = $request->query('source', $request->query('utm_source', 'packaging'));
        $campaign = $request->query('campaign', $request->query('utm_campaign'));
        $medium = $request->query('medium', $request->query('utm_medium'));
        $referrer = $request->header('referer');

        return [
            'visitor_hash' => $visitorHash,
            'device_type' => $deviceType,
            'platform' => $platform,
            'browser' => $browser,
            'source' => substr($source, 0, 100),
            'campaign' => $campaign ? substr($campaign, 0, 100) : null,
            'medium' => $medium ? substr($medium, 0, 100) : null,
            'referrer' => $referrer ? substr($referrer, 0, 500) : null,
            'user_agent' => substr($userAgent, 0, 1000),
        ];
    }

    /**
     * Helper to draw horizontally centered TTF text onto a GD image.
     */
    protected function drawCenteredTtfText($image, string $text, string $fontPath, float $size, int $y, int $color): void
    {
        $box = imagettfbbox($size, 0, $fontPath, $text);
        if ($box === false) {
            return;
        }
        $textW = abs($box[4] - $box[0]);
        $x = (int)((imagesx($image) - $textW) / 2);
        imagettftext($image, $size, 0, $x, $y, $color, $fontPath, $text);
    }
}
