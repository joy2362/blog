<?php

namespace Database;

use PDO;
use PDOException;

class DB
{

    private static string $db_host;
    private static string $db_port;
    private static string $db_name;
    private static string $db_username;
    private static string $db_password;

    /**
     * @param string $db_host
     */
    private static function setDbHost(string $db_host): void
    {
        self::$db_host = $db_host;
    }

    /**
     * @param string $db_port
     */
    private static function setDbPort(string $db_port): void
    {
        self::$db_port = $db_port;
    }

    /**
     * @param string $db_name
     */
    private static function setDbName(string $db_name): void
    {
        self::$db_name = $db_name;
    }

    /**
     * @param string $db_username
     */
    private static function setDbUsername(string $db_username): void
    {
        self::$db_username = $db_username;
    }

    /**
     * @param string $db_password
     */
    private static function setDbPassword(string $db_password): void
    {
        self::$db_password = $db_password;
    }


    private static function load(): void
    {
        $config = include('config/app.php');
        self::setDbHost($config['db_host']);
        self::setDbPort($config['db_port']);
        self::setDbName($config['db_name']);
        self::setDbUsername($config['db_username']);
        self::setDbPassword($config['db_password']);
    }
    public static function connection()
    {
        self::load();
        try {
            $conn = new PDO(
                "mysql:host=" . self::$db_host . ":" . self::$db_port . ";dbname=" . self::$db_name,
                self::$db_username,
                self::$db_password
            );
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (\PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
