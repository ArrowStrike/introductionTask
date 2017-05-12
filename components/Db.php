<?php

class Db
{
    public static function getConnection()
    {
        $params = Config::getConfig('db');
        $dsn = "mysql:host={$params['host']};dbname={$params['dbName']}";

        try {
            $db = new PDO(
                $dsn,
                $params['user'],
                $params['password'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
            );

            $db->exec("set names utf8");

        } catch (PDOException $e) {
            echo 'DB connection failed: '.$e->getMessage();
            die();
        }

        return $db;

    }
}