<?php

namespace App\Http\Utilities;

class State{

    protected static $states = [
            "AMA"    =>    "Amazonas",
            "ANC"    =>    "Ancash",
            "APU"    =>    "Apurimac",
            "ARE"    =>    "Arequipa",
            "AYA"    =>    "Ayacucho",
            "CAJ"    =>    "Cajamarca",
            "CUS"    =>    "Cuzco",
            "HUV"    =>    "Huancavelica",
            "HUC"    =>    "Huanuco",
            "ICA"    =>    "Ica",
            "JUN"    =>    "Junín",
            "LAL"    =>    "La Libertad",
            "LAM"    =>    "Lambayeque",
            "LIM"    =>    "Lima",
            "LOR"    =>    "Loreto",
            "MDD"    =>    "Madre de Dios",
            "MOQ"    =>    "Moquegua",
            "PAS"    =>    "Pasco",
            "PIU"    =>    "Piura",
            "PUN"    =>    "Puno",
            "SAM"    =>    "San Martin",
            "TAC"    =>    "Tacna",
            "TUM"    =>    "Tumbes",
            "UCA"    =>    "Ucayali"
        ];


    public static function all(){
        return static::$states;
    }


}