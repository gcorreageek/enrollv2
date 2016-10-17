<?php

namespace App\Http\Utilities;

class City{

    protected static $cities = [
            "ANC"    =>    "Ancon",
            "ATE"    =>    "Ate",
            "BAR"    =>    "Barranco",
            "BRE"    =>    "Breña",
            "CAL"    =>    "Callao",
            "CAR"    =>    "Carabayllo",
            "CLI"    =>    "Cercado de Lima",
            "CHA"    =>    "Chaclacayo",
            "CHO"    =>    "Chorrillos",
            "CIE"    =>    "Cieneguilla",
            "COM"    =>    "Comas",
            "AGU"    =>    "El Agustino",
            "IND"    =>    "Independencia",
            "JMA"    =>    "Jesus Maria",
            "MOL"    =>    "La Molina",
            "VIC"    =>    "La Victoria",
            "LIN"    =>    "Lince",
            "OLI"    =>    "Los Olivos",
            "LUR"    =>    "Lurigancho (Chosica)",
            "LUN"    =>    "Lurin",
            "MAG"    =>    "Magdalena",
            "MIR"    =>    "Miraflores",
            "PCH"    =>    "Pachacamac",
            "PUC"    =>    "Pucusana",
            "PLI"    =>    "Pueblo Libre",
            "PPI"    =>    "Puente Piedra",
            "PHE"    =>    "Punta Hermosa",
            "PNE"    =>    "Punta Negra",
            "RIM"    =>    "Rimac",
            "SBA"    =>    "San Bartolo",
            "SBO"    =>    "San Borja",
            "SIS"    =>    "San Isidro",
            "SJL"    =>    "S.J. Lurigancho",
            "SJM"    =>    "S.J. Miraflores",
            "SLU"    =>    "San Luis",
            "SMP"    =>    "S.M. Porres",
            "SNM"    =>    "San Miguel",
            "SAN"    =>    "Santa Anita",
            "SMM"    =>    "Santa Maria",
            "SRO"    =>    "Santa Rosa",
            "SUR"    =>    "Surco",
            "SRQ"    =>    "Surquillo",
            "VSA"    =>    "Villa el Salvador",
            "VMT"    =>    "V.M. Triunfo"
        ];


    public static function all(){
        return static::$cities;
    }


}