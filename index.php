<?php

/**
 * Laravel Subdirectory Entry Point
 * Safely forwards root /dev/aaradhna/ requests to public/index.php
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? ''
);

// Check if static file requested directly
$relative = preg_replace('#^/dev/aaradhna#', '', $uri);
$staticFile = __DIR__ . '/public' . $relative;

if (!empty($relative) && $relative !== '/' && file_exists($staticFile) && !is_dir($staticFile)) {
    $ext = pathinfo($staticFile, PATHINFO_EXTENSION);
    $mimes = [
        'css' => 'text/css',
        'js' => 'application/javascript',
        'json' => 'application/json',
        'png' => 'image/png',
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'webp' => 'image/webp',
        'svg' => 'image/svg+xml',
        'ico' => 'image/x-icon',
        'woff' => 'font/woff',
        'woff2' => 'font/woff2',
        'ttf' => 'font/ttf',
    ];
    $contentType = $mimes[strtolower($ext)] ?? mime_content_type($staticFile);
    header("Content-Type: {$contentType}");
    readfile($staticFile);
    exit;
}

require_once __DIR__ . '/public/index.php';
