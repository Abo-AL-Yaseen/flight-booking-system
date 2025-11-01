<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable((dirname(__DIR__)));
$dotenv->load();

$capsule = new Capsule;
$capsule->addConnection([
    'driver' =>  $_ENV['DB_DRIVER'],
    'host' => $_ENV['DB_HOST'],
    'database' => $_ENV['DB_DATABASE'],
    'username' => $_ENV['DB_USERNAME'],
    'password' => $_ENV['DB_PASSWORD'],
    'charset' => $_ENV['DB_CHARSET'],
    'collation' => $_ENV['DB_COLLATION']
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
try {
    $capsule->getConnection()->getPdo();
} catch (\Exception $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
}
