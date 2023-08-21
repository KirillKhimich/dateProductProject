<?php

namespace Classes;

class DateProductLogger extends DateProductEventer
{
    public function __construct()
    {
        parent::__construct();
    }

    public function log(){
        echo "privet";
    }
}