<?php

use app\core\Application;

/**
 * Import autoloaded  files for resolving app namespaces
 */
require_once __DIR__ . '/../vendor/autoload.php';

// Create a new instance of the application
$app = new Application(dirname(__DIR__));

// Define the applicatio routes appplication routes
$app->router->get('/', 'home');

$app->router->get('/contact', 'contact');

// Run the application
$app->run();

