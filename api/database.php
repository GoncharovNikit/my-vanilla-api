<?php

const DB_NAME = "my_api";
const USER = "root";
const PASSW = "root";

class Database
{
    public static function getConnection() {
        $connection = null;
        try {
            $connection = new PDO("mysql:host=localhost;dbname=" . DB_NAME, USER, PASSW);
            $connection->exec('set names utf8');
            return $connection;
            
        } catch (PDOException $e) {
            echo "Connection Error! ".$e->getMessage();
        }
        return $connection;
    }

}


