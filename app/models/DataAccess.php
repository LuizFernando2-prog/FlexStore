<?php
require_once __DIR__ . '/../../config/db.php';

class DataAccess
{

    private static $mysqli = null;

    public static function getConnection()
    {
        if (self::$mysqli === null) {
            $config = require __DIR__ . '/../../config/config.php';
            self::$mysqli = new mysqli(
                $config['host'],
                $config['username'],
                $config['password'],
                $config['dbname']
            );

            if (self::$mysqli->connect_error) {
                die('Connect Error (' . self::$mysqli->connect_errno . ') ' . self::$mysqli->connect_error);
            }
        }
        return self::$mysqli;
    }

    
}
