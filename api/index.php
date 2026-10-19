<?php

define('LARAVEL_START', microtime(true));

// Entry point Vercel untuk Laravel 10.
require __DIR__ . '/../public/index.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$app->handleRequest(
    Illuminate\Http\Request::capture()
);