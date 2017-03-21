<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{

    protected $fillable = [
        'field_id',
        'runner_id',
        'value',
    ];


    public function field()
    {
        return $this->belongsTo('App\Field');
    }


}
