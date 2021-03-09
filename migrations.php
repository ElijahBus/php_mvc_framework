<?php

use app\core\Application;

/**
 * Import autoloaded  files for resolving app namespaces
 */
require_once __DIR__ . '/vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

// Create a new instance of the application
$app = new Application(__DIR__, $config);

// Run the application
$app->db->applyMigrations();
