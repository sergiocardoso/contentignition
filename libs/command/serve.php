<?php

namespace App\Command;

/**
 * @desc Serve command that enable PHP Auto Serve and start a host for the browser.
 * @author Sérgio Cardoso
 */


class Serve
{
    use \App\Utils;

    private static $instance;
    private static $help;
    private static $db;

    public function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Serve();
            self::makeCommand();
        }
        return self::$instance;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private static function makeCommand()
    {
        print "\033[34m// CONTENT IGNITION - serve command\n";
        print "\033[0mServer Enabled on http://localhost:1616\n";
        shell_exec('php -S localhost:1616');
    }
}
