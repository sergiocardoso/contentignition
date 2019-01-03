<?php

namespace App;

/**
 * @desc Help class for CLI command that show all commands available like the way to use it.
 * @author Sérgio Cardoso
 */


class Help
{
    private static $instance;

    public static function getInstance($command)
    {
        if (!isset(self::$instance)) {
            self::$instance = new Help();
            if ($command != "error") {
                self::command($command);
            }
        }
        return self::$instance;
    }

    public static function command($command)
    {
        switch ($command) {
            case '':
                print "\n";
                print "\033[34m// CONTENT IGNITION \n";
                // print "--------------------------------------\n";
                print "\033[0mWelcome to Support Command Line!\n";
                print "See below all the commands available for this CLI application:";
                print "\n";
                print "";
                echo "\033[32m create \t \033[0m create a database\n";
                echo "\033[32m import-csv \t \033[0m import a CSV file with params: <path-to-csv>\n";
                echo "\033[32m serve\t \t \033[0m enable server page on your local system\n";
                echo "\033[32m about \t \t \033[0m support and about info for this application\n";
                break;
            case 'create':
                print "\n";
                print "\033[34m// CONTENT IGNITION - create command\n";
                print "\033[0mDescription: Create a new database on the server specified on the argumnts.\n";
                print "\033[0mArguments: host=<host> user=<user> pass=<password> db=<database>.\n";
                break;
            case 'import-csv':
                print "\n";
                print "\033[34m// CONTENT IGNITION - import-csv command\n";
                print "\033[0mDescription: Import a valid CSV file from a command line.\n";
                print "\033[0mArguments: host=<host> user=<user> pass=<password> db=<database> <path-to-csv>.\n";
                print "\033[33mExample: php app.php import-csv host=127.0.0.1 user=root pass=test db=db myfile.csv\n";
                break;
            case 'about':
                print "\n";
                print "\033[34m// CONTENT IGNITION - about command\n";
                print "\033[0mDescription: This application was build by Sérgio Cardoso for Trial Test.\n";
                print "\033[33mWebsite: https://www.sergiocardoso.org.\n";
                print "\033[33mAuthor: Sérgio Cardoso <contato@sergiocardoso.org>\n";
                break;
            case 'serve':
                print "\n";
                print "\033[34m// CONTENT IGNITION - serve command\n";
                print "\033[0mDescription: enable a server to show all records.\n";
                print "\033[0mArguments: host=<host> user=<user> pass=<password> db=<database>.\n";
                print "\033[33mExample: php app.php serve host=127.0.0.1 user=root pass=test db=db\n";


                break;
        }
    }

    public static function error($msg)
    {
        print "\n";
        print "\033[34m// CONTENT IGNITION - Error Command\n";
        print "\033[0m".$msg."\n";
    }

    private function __construct()
    {
    }
    private function __clone()
    {
    }
}
