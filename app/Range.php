<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Range extends Model
{
    public function engine()
    {
        return $this->belongsTo('App\Engine');
    }

    public function tracks()
    {
        return $this->belongsToMany('App\Track')->withPivot('quota', 'count', 'first', 'last');
    }

    public function codes()
    {
        return $this->hasMany('App\Code');
    }

    static public function makeDummy()
    {
        $range = new self();

        $range->id = 0;
        $range->engine_id = 0;
        $range->name = '';

        return $range;
    }

}
