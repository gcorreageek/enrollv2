<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{


    public static function wrap($array)
    {
        if (empty($array)) {
            $error_string = null;
        } else {
            $error_string = serialize($array);
        }
        return $error_string;
    }


    public static function unwrap($string)
    {
        if (is_null($string)) {
            $error_array = [];
        } else {
            $error_array = unserialize($string);
        }

        return $error_array;
    }

}
