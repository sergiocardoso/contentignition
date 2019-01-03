<?php

namespace App;

/**
 * @desc Database class with almost features for database like connections, sql, create database, tables, etc
 * @author Sérgio Cardoso
 */


class Database
{
    private static $instance;
    private static $conn = null;

    public function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    private function __construct()
    {
    }
    private function __clone()
    {
    }

    public function connect($args)
    {
        try {
            self::$conn = new \PDO("mysql:host=".$args[2][1], $args[3][1], $args[4][1]);
            self::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            \App\Help::getInstance('error')::error($e->getMessage());
            return false;
        }
        return $this;
    }

    public function selectdb($db)
    {
        self::$conn->exec("use ".$db);
        return $this;
    }

    public function sql($sql, $db, $success)
    {
        if (!$db) {
            $db = "";
        }

        try {
            $data = self::$conn->exec($sql);
            
            if ($success) {
                print "\n";
                print "\033[34m//CONTENT IGNITION - DATABASE: " . $db . "\n";
                print "--------------------------------------\n";
                print $success;
            } else {
                return $data;
            }
        } catch (\PDOException $e) {
            \App\Help::getInstance('error')::error($e->getMessage());
        }
    }

    public function status()
    {
        return self::$conn;
    }

    public function makeTable()
    {
        if (!self::checkTable()) {
            $SQL_TABLE = "CREATE TABLE Trial (
    ID int NOT NULL AUTO_INCREMENT,
    Client_id int,
    Client varchar(255),
    Deal_id int,
    Deal varchar(255),
    Hour varchar(255),
    Accept varchar(255),
    Refused varchar(255),
    PRIMARY KEY (ID)
);";
            $this->sql($SQL_TABLE, $args[5][1], "Table 'Trial' created with success!!");
        }
       

        return $this;
    }

    public static function checkTable()
    {
        $bool = false;
        try {
            $SQL = "select 1 from `Trial` LIMIT 1";
            $value = self::$conn->exec($SQL);
            $bool = true;
        } catch (\PDOException $e) {
            $bool = false;
        }
        return $bool;
    }
}
