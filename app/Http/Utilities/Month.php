<?php

namespace App\Http\Utilities;

class Month{

    protected static $months = [
            "1"     =>  "01",
            "2"     =>  "02",
            "3"     =>  "03",
            "4"     =>  "04",
            "5"     =>  "05",
            "6"     =>  "06",
            "7"     =>  "07",
            "8"     =>  "08",
            "9"     =>  "09",
            "10"    =>  "10",
            "11"    =>  "11",
            "12"    =>  "12"
        ];


    public static function all(){
        return static::$months;
    }


}