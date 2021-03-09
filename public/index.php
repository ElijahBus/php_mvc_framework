<?php

use app\core\Application;
use app\controllers\AuthController;
use app\controllers\SiteController;

/**
 * Import autoloaded  files for resolving app namespaces
 */
require_once __DIR__ . '/../vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

// Create a new instance of the application
$app = new Application(dirname(__DIR__), $config);

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
