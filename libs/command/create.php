<?php

namespace App\Command;

/**
 * @desc Create Class that create a Mysql database. This class make available the database conform the arguments sent in CLI command.
 * @author Sérgio Cardoso
 */


class Create
{
    use \App\Utils;

    private static $instance;
    private static $help;
    private static $db;

    public function getInstance($args)
    {
        if (!isset(self::$instance)) {
            self::$instance = new Create();

            //error
            if (count($args) != 6) {
                \App\Help::getInstance('error')::error("No arguments or some of them with error.\nUse only this arguments: host=<host> user=<user> pass=<pass> db=<db>.\nPlease see help with command: \033[33mphp app.php help create");
            } else {
                self::makeCommand($args);
            }
        }
        return self::$instance;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private static function makeCommand($args)
    {
        if (self::verifyCommands($args)) {
            foreach ($args as $key => $arg) {
                $args[$key] = self::makeArray($arg);
            }

            $conn = \App\database::getInstance();
            $conn->connect($args);
            if ($conn) {
                $sql = "CREATE DATABASE " . $args[5][1];
                \App\database::getInstance($args)->sql($sql, $args[5][1], "\033[0mCongratulations, your database was created with successful.\033[0m\n");
            }
        };
    }
}
