<?php

namespace App\Http\Utilities;

class Relationship{

    protected static $relationships = [
        'padre'     => 'Padre',
        'madre'     => 'Madre',
        'hermano'   => 'Hermano(a)',
        'hijo'      => 'Hijo(a)',
        'amigo'     => 'Amigo(a)',
        'conyuge'   => 'Cónyuge',
        'pareja'    => 'Pareja',
        'medico'    => 'Médico',
        'otro'      => 'Otro'
    ];


    public static function all(){
        return static::$relationships;
    }


}