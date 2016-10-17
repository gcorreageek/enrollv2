<?php

namespace App\Http\Utilities;

class Blood{

    protected static $bloods = [
            'A+'    =>  'A+',
            'A-'    =>  'A-',
            'B+'    =>  'B+',
            'B-'    =>  'B-',
            'O+'    =>  'O+',
            'O-'    =>  'O-',
            'AB+'	=>  'AB+',
            'AB-'	=>  'AB-',
            'NAN'   =>  'No sabe / no está seguro(a)'
        ];


    public static function all(){
        return static::$bloods;
    }


}