<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gateway extends Model
{
    public function engines()
    {
        return $this->belongsToMany('App\Engine');
    }


    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }


    static public function makeDummy()
    {
        $gateway = new self();

        $gateway->id = 0;
        $gateway->name = '';
        $gateway->store_id = '';
        $gateway->enabled = false;
        $gateway->url_production = '';
        $gateway->url_development = '';
        $gateway->url_emulator = '';

        return $gateway;
    }
}
