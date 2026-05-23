<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Register the Composer autoloader...
require __DIR__ . '/../vendor/autoload.php';

// Vercel only allows writing to /tmp
$_SERVER['DOCUMENT_ROOT'] = $_SERVER['DOCUMENT_ROOT'] ?: __DIR__ . '/../public';

// Bootstrap Laravel
$app = require_once __DIR__.'/../bootstrap/app.php';

// Move storage to /tmp
$app->useStoragePath($_ENV['APP_STORAGE'] ?? '/tmp/storage');

// Ensure storage directories exist
$storagePath = $app->storagePath();
foreach (['/framework/views', '/framework/cache/data', '/framework/sessions', '/logs'] as $dir) {
    if (!is_dir($storagePath . $dir)) {
        mkdir($storagePath . $dir, 0777, true);
    }
}

// Handle the request
$app->handleRequest(Request::capture());

