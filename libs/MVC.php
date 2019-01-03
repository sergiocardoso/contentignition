<?php

namespace App;

/**
 * @desc Class exclusive for SERVE command o CLI, this bootstrap the view on the browser with all data and features.
 * @author Sérgio Cardoso
 */


class MVC
{
    use \App\Utils;

    private static $instance;
    private static $command;
    private static $conn;

    public function getInstance($args)
    {
        if (!isset(self::$instance)) {
            self::$instance = new MVC();
            $verify = self::verifyGET($args);
            
            if ($verify !== true) {
                $GLOBALS['error_message'] = $verify;
            } else {
            }
            self::bootstrap($args);
        }
        return self::$instance;
    }

    private function __construct()
    {
    }
    private function __clone()
    {
    }

    public function bootstrap($args)
    {
        if (self::connect($args)) {
            self::showData($args);
        };

        include('./assets/index.php');
    }

    public static function verifyGET($args)
    {
        if (!array_key_exists('host', $args)) {
            return "please insert the host from database";
        } elseif (!array_key_exists('user', $args)) {
            return "please insert the user from database";
        } elseif (!array_key_exists('pass', $args)) {
            return "please insert the password from database";
        } elseif (!array_key_exists('db', $args)) {
            return "please insert the database";
        }

        return true;
    }

    public static function connect($args)
    {
        try {
            self::$conn = new \PDO("mysql:host=" . $args['host'], $args['user'], $args['pass']);
            self::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$conn->exec("use " . $args['db']);

            $GLOBALS['conn']['host'] = $args['host'];
            $GLOBALS['conn']['user'] = $args['user'];
            $GLOBALS['conn']['pass'] = $args['pass'];
            $GLOBALS['conn']['db'] = $args['db'];
            $GLOBALS['conn']['url'] = "/?host={$args['host']}&user={$args['user']}&pass={$args['pass']}&db={$args['db']}";
            $GLOBALS['conn']['original'] = "/?host={$args['host']}&user={$args['user']}&pass={$args['pass']}&db={$args['db']}";
            $GLOBALS['conn']['filter']['client'] = ($args['filter_client'] != 'N') ? $args['filter_client'] : '';
            $GLOBALS['conn']['filter']['deal'] = ($args['filter_deal'] != 'N') ? $args['filter_deal'] : '';

            if (array_key_exists('filter_client', $args) && $args['filter_client'] != "") {
                $GLOBALS['conn']['url'] .= "&filter_client={$args['filter_client']}";
            }

            if (array_key_exists('filter_deal', $args) && $args['filter_deal'] != "") {
                $GLOBALS['conn']['url'] .= "&filter_deal={$args['filter_deal']}";
            }

            return true;
        } catch (\PDOException $e) {
            $GLOBALS['error_message'] = $e->getMessage();
            return false;
        }
    }

    public static function showData($args)
    {
        $SQL = "SELECT * FROM Trial";
        $where = self::where($args);
        $orderBy = self::orderBy($args);

        $data = self::$conn->prepare($SQL. $where .$orderBy);
        $data->execute();
        $GLOBALS['records'] = $data->fetchAll();
        $GLOBALS['total'] = count($GLOBALS['records']);
    }

    public static function where($args)
    {
        $WHERE = ' ';


        if (array_key_exists('filter_deal', $args) && array_key_exists('filter_client', $args) && $args['filter_client'] != "N" && $args['filter_deal'] != "N") {
            $WHERE .= 'WHERE Deal_id like '.$args['filter_deal'].' AND Client_id like '.$args['filter_client'];
        } else {
            if (array_key_exists('filter_deal', $args) && $args['filter_deal'] != "N") {
                $GLOBALS['filter_client'] = $args['client_filter'];
                $WHERE .= 'WHERE Deal_id like '.$args['filter_deal'];
            } elseif (array_key_exists('filter_client', $args) && $args['filter_client'] != "N") {
                $GLOBALS['filter_deal'] = $args['deal_filter'];
                $WHERE .= 'WHERE Client_id like ' . $args['filter_client'];
            }
        }
        return $WHERE;
    }

    public static function orderBy($args)
    {
        $orderBy = ' ';
        
        if (array_key_exists('type', $args)) {
            switch ($args['type']) {
                case 'hour':
                    $orderBy = ' ORDER BY HOUR(Hour) DESC';
                    break;
                case 'day':
                    $orderBy = ' ORDER BY DAY(Hour) DESC';
                    break;
                case 'mouth':
                    $orderBy = ' ORDER BY MONTH(Hour) DESC';
                    break;
            }
        } else {
            $orderBy = (array_key_exists('orderBy', $args)) ? ' ORDER BY ' . $args['orderBy'] . ' DESC ' : '';
        }

        return $orderBy;
    }
}
