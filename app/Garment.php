<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garment extends Model
{
    public function tracks()
    {
        return $this->hasMany('App\Track');
    }

    public function sizes()
    {
        return $this->belongsToMany('App\Size')->withPivot('gender', 'stock', 'spent');
    }
}
