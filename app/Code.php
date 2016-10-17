<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    public function track()
    {
        return $this->belongsTo('App\Track');
    }

    public function range()
    {
        return $this->belongsTo('App\Range');
    }

    static public function makeDummy()
    {
        $code = new self();

        $code->id = 0;
        $code->range_id = 0;
        $code->track_id = 0;
        $code->code = '';
        $code->redeemed = false;
        $code->bib = 0;

        return $code;
    }
}
