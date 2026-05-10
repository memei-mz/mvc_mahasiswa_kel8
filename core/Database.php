<?php

require_once '../config/database.php';

class Database {

    private static $instance = null;

    public static function getConnection() {

        if (self::$instance == null) {

            $config = new ConfigDatabase();

            self::$instance = new PDO(
                "mysql:host={$config->host};dbname={$config->dbname}",
                $config->username,
                $config->password
            );

            self::$instance->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        }

        return self::$instance;
    }
}