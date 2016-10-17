<?php

namespace App\Http\Utilities;

class Province{

    protected static $provinces = [
            "BRR"    =>    "Barranca",
            "CJT"    =>    "Cajatambo",
            "CNT"    =>    "Canta",
            "CTE"    =>    "Cañete",
            "HUA"    =>    "Huaral",
            "HRI"    =>    "Huarochiri",
            "HRA"    =>    "Huaura",
            "LIM"    =>    "Lima",
            "OYN"    =>    "Oyon",
            "YAY"    =>    "Yauyos"
        ];


    public static function all(){
        return static::$provinces;
    }


}