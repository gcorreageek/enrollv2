<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public function transaction()
    {
        return $this->hasOne('App\Transaction');
    }


    static public function makeDummy()
    {
        $coupon = new self();

        $coupon->id = 0;
        $coupon->engine_id = 0;
        $coupon->transaction_id = 0;
        $coupon->coupon = '';
        $coupon->discount = 'percent';
        $coupon->value = 0;
        $coupon->status = false;

        return $coupon;
    }


    function calculateDiscount($price)
    {
        if($this->discount == 'percent'){
            $amount = ($price * ($this->value / 100));
        }else{
            $amount = $this->value;
        }

        return $amount;
    }
}
