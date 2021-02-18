<?php

use app\core\Application;

/**
 * Import autoloaded  files for resolving app namespaces
 */
require_once __DIR__ . '/vendor/autoload.php';

// Create a new instance of the application
$app = new Application();

// Define all appplication routes
$app->router->get('/', function() {
    return 'Hello world';
});

// Run the application
$app->run();

