<?php

namespace Classes;

class PreparingHelper
{
    private static function validateData($data) : string{ // preparing rid of mnemonic symbols and JS code
        return htmlspecialchars(strip_tags($data));
    }

    public static function prepareDate($date) : string{ // preparing date-string variables from the user interface
        if (is_string ($date)) {
            $date = strtotime($date);
            if ($date !== false) {
                return self::validateData(date("Y-m-d", $date));
            }else throw new \InvalidArgumentException("empty date-string");
        }else throw new \InvalidArgumentException("variable is not a date-string");
    }
    public static function prepareString($string) : string{ // preparing string variables from the user interface
        if (is_string ($string)){
            if (!empty($string)){
                return self::validateData($string);
            }else throw new \InvalidArgumentException("empty string");
        }else throw new \InvalidArgumentException("variable is not a string");
    }
    public static function prepareInt($int) : int{ // preparing integer variables from the user interface
        if (is_int($int)){
                return self::validateData($int);
        }else throw new \InvalidArgumentException("variable is not a integer");
    }
}