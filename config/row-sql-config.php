<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

function getDatabaseConnection()
{
    static $pdo = null;

    if ($pdo === null) {
        $dotenv = Dotenv::createImmutable((dirname(__DIR__)));
        $dotenv->load();
        $pdo = new PDO("pgsql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_DATABASE']};user={$_ENV['DB_USERNAME']};password={$_ENV['DB_PASSWORD']}");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    return $pdo;
}
function makeQuery($sql, $params = [])
{

    $conn = getDatabaseConnection();

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
