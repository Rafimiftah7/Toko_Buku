<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Register the Composer autoloader...
require __DIR__ . '/../vendor/autoload.php';

// Vercel only allows writing to /tmp
$_SERVER['DOCUMENT_ROOT'] = $_SERVER['DOCUMENT_ROOT'] ?: __DIR__ . '/../public';

// Ensure storage directories exist in /tmp BEFORE booting Laravel
$storagePath = '/tmp/storage';
foreach (['/framework/views', '/framework/cache/data', '/framework/sessions', '/logs'] as $dir) {
    if (!is_dir($storagePath . $dir)) {
        mkdir($storagePath . $dir, 0777, true);
    }
}

// Bootstrap Laravel
$app = require_once __DIR__.'/../bootstrap/app.php';

// Handle the request
$app->handleRequest(Request::capture());

