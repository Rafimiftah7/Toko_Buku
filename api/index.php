<?php

/**
 * Forward Vercel requests to normal Laravel public/index.php
 */

// Vercel only allows writing to /tmp
require __DIR__ . '/../vendor/autoload.php';

$_SERVER['DOCUMENT_ROOT'] = $_SERVER['DOCUMENT_ROOT'] ?: __DIR__ . '/../public';
$app = require __DIR__.'/../bootstrap/app.php';
$app->useStoragePath($_ENV['APP_STORAGE'] ?? '/tmp/storage');

// Ensure storage directories exist
$storagePath = $app->storagePath();
foreach (['/framework/views', '/framework/cache/data', '/framework/sessions', '/logs'] as $dir) {
    if (!is_dir($storagePath . $dir)) {
        mkdir($storagePath . $dir, 0777, true);
    }
}

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);
$response->send();
$kernel->terminate($request, $response);

