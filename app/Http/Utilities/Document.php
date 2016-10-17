<?php

namespace App\Http\Utilities;

class Document{

    protected static $documents = [
            "DNI"    =>    "DNI / ID / Cédula",
            "PAS"    =>    "Pasaporte",
            "CEX"    =>    "Carné de Extranjería"
        ];


    public static function all(){
        return static::$documents;
    }


}