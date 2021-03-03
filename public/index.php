<?php

use app\core\Application;
use app\controllers\AuthController;
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


// Authentication

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);



// Run the application
$app->run();

