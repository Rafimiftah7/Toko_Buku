<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));
define('IS_VERCEL', true);

// Register the Composer autoloader...
require __DIR__ . '/../vendor/autoload.php';

// Vercel only allows writing to /tmp
$_SERVER['DOCUMENT_ROOT'] = $_SERVER['DOCUMENT_ROOT'] ?: __DIR__ . '/../public';

// Ensure storage directories exist in /tmp BEFORE booting Laravel
$storagePath = '/tmp/storage';
foreach (['/framework/views', '/framework/cache/data', '/framework/sessions', '/logs', '/cache'] as $dir) {
    if (!is_dir($storagePath . $dir)) {
        mkdir($storagePath . $dir, 0777, true);
    }
}

// Override Laravel's read-only cache paths for Vercel
putenv("APP_SERVICES_CACHE={$storagePath}/cache/services.php");
putenv("APP_PACKAGES_CACHE={$storagePath}/cache/packages.php");
putenv("APP_CONFIG_CACHE={$storagePath}/cache/config.php");
putenv("APP_ROUTES_CACHE={$storagePath}/cache/routes-v7.php");
putenv("APP_EVENTS_CACHE={$storagePath}/cache/events.php");
putenv("VIEW_COMPILED_PATH={$storagePath}/framework/views");

// Bootstrap Laravel
$app = require_once __DIR__.'/../bootstrap/app.php';

// Handle the request
$app->handleRequest(Request::capture());

