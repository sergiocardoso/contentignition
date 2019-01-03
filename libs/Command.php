<?php

namespace App;

/**
 * @desc This is a loader class for specific command that enter by CLI.
 * @author Sérgio Cardoso
 */



class Command
{
    private static $instance;
    private static $command;

    public function getInstance($args)
    {
        if (!isset(self::$instance)) {
            self::$instance = new Command();
            switch ($args[1]) {
                case 'create':
                    self::$command = \App\Command\Create::getInstance($args);
                    break;
                case 'import-csv':
                    self::$command = \App\Command\importCSV::getInstance($args);
                    break;
                case 'serve':
                    self::$command = \App\Command\Serve::getInstance($args);
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
}
