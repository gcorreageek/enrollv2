<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{

    public function track()
    {
        return $this->belongsTo('App\Track');
    }


    public function values()
    {
        return $this->hasMany('App\Value');
    }


}
