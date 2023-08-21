<?php

namespace Classes;

class PreparingHelper
{

    private static function validateData($data) : string{ // preparing rid of mnemonic symbols and JS code
        return htmlspecialchars(strip_tags($data));
    }

    public static function prepareDate($date) : string{ // preparing date-string variables from the user interface
            $date = strtotime($date);
            if ($date !== false) {
                return self::validateData(date("Y-m-d", $date));
            }else throw new \InvalidArgumentException("variable is not date-string or empty date-string");
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
                if ($int < 1 && $int > 30) {
                    throw new \InvalidArgumentException("not correct integer");
                }else return $int;
        }else throw new \InvalidArgumentException("variable is not a integer");
    }
}