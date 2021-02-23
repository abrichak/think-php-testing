<?php

namespace App\Helper;

use ParagonIE\EasyDB\EasyDB;
use ParagonIE\EasyDB\Factory;

class DB
{
    private static ?EasyDB $db = null;

    public static function connection(): EasyDB
    {
        if (!self::$db) {
            $connection = $_ENV['DB_CONNECTION'];
            $host = $_ENV['DB_HOST'];
            $database = $_ENV['DB_DATABASE'];
            $user = $_ENV['DB_USERNAME'];
            $password = $_ENV['DB_PASSWORD'];

            self::$db = Factory::fromArray([
                sprintf('%s:host=%s;dbname=%s', $connection, $host, $database),
                $user,
                $password
            ]);
        }

        return self::$db;
    }
}
