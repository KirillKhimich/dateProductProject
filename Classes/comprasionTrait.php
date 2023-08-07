<?php

namespace Classes;

trait comprasionTrait
{
    public function validateData($data){
        return htmlspecialchars(strip_tags($data));
    }

    public function isDate($date){
        $date = strtotime($date);
        if ($date !== false){
            return $date = $this->validateData(date("Y-m-d",$date));
        }else return false;
    }
    public function isString($string){
        if ($string !== "" && $string !== false && $string !== null){
            if (is_string($string) !== false){
                return $this->validateData($string);
            }else return false;
        }else return false;
    }
    public function isInt($int){
        if ($int !== false && $int !== null){
            if (is_int($int) !== false){
                return $this->validateData($int);
            }else return false;
        }else return false;
    }
}