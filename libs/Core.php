<?php

namespace App;

/**
 * @desc This class manage the commands from command line and start each like class respectively
 * @author Sérgio Cardoso
 */


class Core
{
    private static $instance;
    private static $args;
    private static $help;
    private static $command;

    public static function getInstance($args)
    {
        if (!isset(self::$instance)) {
            self::$instance = new Core();
            self::$args = $args;
            self::startConfiguration();
        }
        return self::$instance;
    }

    private function __construct()
    {
    }
    private function __clone()
    {
    }

    private static function startConfiguration()
    {
        if (self::$args[1] == 'help') {
            self::$help = \App\Help::getInstance(self::$args[2]);
        } else {
            self::$command = \App\Command::getInstance(self::$args);
        }
    }

    private static function find($value)
    {
        return $value;
    }
}
