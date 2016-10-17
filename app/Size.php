<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function garments()
    {
        return $this->belongsToMany('App\Garment')->withPivot('gender', 'spent');
    }
}
