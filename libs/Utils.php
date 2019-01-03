<?php

namespace App;

/**
 * @desc Trait with functions shared by many class on this application.
 * @author Sérgio Cardoso
 */

trait Utils
{
    private static function verifyCommands($args)
    {
        if (strpos($args[2], 'host=') === false) {
            \App\Help::getInstance('error')::error("No Host (host=<host>) argument provider, see help command!");
            return false;
        }

        if (strpos($args[3], 'user=') === false) {
            \App\Help::getInstance('error')::error("No User (user=<user>) argument provider, see help command!");
            return false;
        }

        if (strpos($args[4], 'pass=') === false) {
            \App\Help::getInstance('error')::error("No Password (pass=<pass>) argument provider, see help command!");
            return false;
        }

        if (strpos($args[5], 'db=') === false) {
            \App\Help::getInstance('error')::error("No Database (db=<db>) argument provider, see help command!");
            return false;
        }


        return true;
    }

    private static function makeArray($arg)
    {
        if (strpos($arg, '=') !== false) {
            return explode('=', $arg);
        }
        return false;
    }

    private static function makeId($array)
    {
        unset($array[0]); //remove the first item -> header CSV

        $new_array = [];
        $temp = [];

        foreach ($array as $key => $item) {
            $client_id = explode('@', $item[0]);
            $deal_id = explode('#', $item[1]);

            $temp[0] = $client_id[1];
            $temp[1] = trim($client_id[0]);
            $temp[2] = $deal_id[1];
            $temp[3] = trim($deal_id[0]);
            $temp[4] = $item[2];
            $temp[5] = $item[3];
            $temp[6] = $item[4];

            array_push($new_array, $temp);
        }
        return $new_array;
    }
}
