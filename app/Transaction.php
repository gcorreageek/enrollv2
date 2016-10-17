<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function gateway()
    {
        return $this->belongsTo('App\Gateway');
    }

    public function track()
    {
        return $this->belongsTo('App\Track');
    }

    public function coupon()
    {
        return $this->hasOne('App\Coupon');
    }


    static public function makeDummy()
    {
        $transaction = new self();

        $transaction->id = 0;
        $transaction->gateway_id = 0;
        $transaction->track_id = 0;
        $transaction->price = 0;
        $transaction->coupon_id = 0;
        $transaction->discount = 0;
        $transaction->amount = 0;
        $transaction->status = 0;
        $transaction->card_number = null;
        $transaction->authorization_code = null;
        $transaction->error = null;
        $transaction->hash = null;
        $transaction->store_id = '';
        $transaction->message = null;

        return $transaction;
    }
}
