<?php

use app\core\Application;
use app\controllers\SiteController;

/**
 * Import autoloaded  files for resolving app namespaces
 */
require_once __DIR__ . '/../vendor/autoload.php';

// Create a new instance of the application
$app = new Application(dirname(__DIR__));

// Define the application routes appplication routes
$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/contact', [SiteController::class, 'contact']);

$app->router->post('/contact', [SiteController::class, 'handleContact']);

// Run the application
$app->run();

