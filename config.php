<?php

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


//return [
//    'app_name' => $_ENV['APP_NAME'] ?? "joy2362",
//    'app_url' => $_ENV['APP_URL'] ?? "http://localhost",
//    'app_root' => dirname(__FILE__),
//    'db_host' => $_ENV['DB_HOST'] ?? "localhost",
//    'db_port' => $_ENV['DB_PORT'] ?? "3306",
//    'db_name' => $_ENV['DB_DATABASE'] ?? "blog",
//    'db_username' => $_ENV['DB_USERNAME'] ?? "root",
//    'db_password' => $_ENV['DB_PASSWORD'] ?? "",
//];


define('app_name', $_ENV['APP_NAME'] ?? "joy2362");
define('app_url', $_ENV['APP_URL'] ?? "http://localhost");
define('app_root', dirname(__FILE__));

define('db_host', $_ENV['DB_HOST'] ?? "localhost");
define('db_port', $_ENV['DB_PORT'] ?? "3306");
define('db_name', $_ENV['DB_DATABASE'] ?? "blog");
define('db_username', $_ENV['DB_USERNAME'] ?? "root");
define('db_password', $_ENV['DB_PASSWORD'] ?? "");

