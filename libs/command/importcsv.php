<?php

namespace App\Command;

/**
 * @desc Import CSV Command that import all data for mysql database.
 * @author Sérgio Cardoso
 */



class Importcsv
{
    use \App\Utils;

    private static $instance;
    private static $help;
    private static $db;
    private static $file;

    public function getInstance($args)
    {
        if (!isset(self::$instance)) {
            self::$instance = new Importcsv();

            //error
            if (count($args) != 7) {
                \App\Help::getInstance('error')::error("No arguments or some of them is missing or with error.\nPlease see help with command: \033[33mphp app.php help import-csv");
            } else {
                self::importCSV($args);
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

    private function importCSV($args)
    {
        if (self::validFile($args[6])) {
            $fileCSV = $args[6];

            if (self::verifyCommands($args)) {
                foreach ($args as $key => $arg) {
                    $args[$key] = self::makeArray($arg);
                }

                $conn = \App\database::getInstance();
                $conn->connect($args)->selectdb($args[5][1])->makeTable();

                $file = fopen($fileCSV, 'r');
                $dataCSV = [];
                while (($line = fgetcsv($file)) !== false) {
                    array_push($dataCSV, $line);
                }
                fclose($file);

                $dataCSV = self::makeId($dataCSV);
                $SQL = "INSERT INTO Trial (Client_id, Client, Deal_id, Deal, Hour, Accept, Refused) VALUES ";
                $counter = 0;
                $total = count($dataCSV);

                foreach ($dataCSV as $record) {
                    $SQL .= "({$record[0]}, '{$record[1]}', {$record[2]}, '{$record[3]}', '{$record[4]}', {$record[5]}, {$record[6]})";

                    $SQL .= ($counter >= $total-1) ? ";" : ",";
                    $counter ++;
                }
                $conn->sql($SQL, $args[5][1], "CSV File import with success to Mysql Database -- {$total} records inserted!");
            };
        }
    }

    private static function validFile($file)
    {
        if (strpos($file, '.csv') !== false && file_exists($file)) {
            return true;
        }
        \App\Help::getInstance('error')::error("This CSV file (".$file.") is invalid or not found!\nPlease check!");
        return false;
    }
}
