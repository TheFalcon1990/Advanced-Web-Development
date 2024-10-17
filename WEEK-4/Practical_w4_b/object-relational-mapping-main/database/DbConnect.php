<?php

namespace database;

use \PDO;
use \PDOException;

class DbConnect
{
    private static $conn;
    public static function getConnection()
    {
        if (!self::$conn) {
            try {
                self::$conn = new PDO('mysql:host=localhost;dbname=MyDatabase', 'MyUsername', 'MyPassword');
            } catch (PDOException $exception) {
                echo "Oh no, there was a problem" . $exception->getMessage();
            }
        }
        return self::$conn;
    }
    public static function closeConnection()
    {
        if (self::$conn) {
            self::$conn = null;
        }
    }
}
