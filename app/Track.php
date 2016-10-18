<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    public function engine()
    {
        return $this->belongsTo('App\Engine');
    }


    public function ranges()
    {
        return $this->belongsToMany('App\Range')->withPivot('quota', 'count', 'first', 'last');
    }


    public function runners()
    {
        return $this->belongsToMany('App\Runner')->withPivot(
            'bib',
            'enrolled',
            'code_id',
            'transaction_id',
            'category_id',
            'size_id',
            'nickname',
            'time_goal',
            'time_best',
            'event_name',
            'event_url',
            'relative_relationship',
            'relative_name',
            'relative_phone',
            'comment'
        )->withTimestamps();
    }


    public function categories()
    {
        return $this->hasMany('App\Category');
    }


    public function codes()
    {
        return $this->hasMany('App\Code');
    }


    public function garment()
    {
        return $this->belongsTo('App\Garment');
    }


    public function rates()
    {
        return $this->hasMany('App\Rate');
    }


    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }


    public function categorySafe($age, $year)
    {
        if($this->engine->assign_method == 'onYear'){
            $categorySafe = $this->categories()->where([['min', '>', $year], ['max', '<', $year]])->get()->count() > 0;
        }else{
            $categorySafe = $this->categories()->where([['min', '<=', $age], ['max', '>=', $age]])->get()->count() > 0;
        }
        return $categorySafe;
    }


    public function assignCategory($age, $year)
    {
        if($this->engine->assign_method == 'onYear'){
            $category = $this->categories()->where([['min', '>', $year], ['max', '<', $year]])->first();
        }else{
            $category = $this->categories()->where([['min', '<=', $age], ['max', '>=', $age]])->first();
        }
        return $category;
    }


    public function genderSafe($gender)
    {
        $genderSafe = (is_null($this->gender) || $this->gender == $gender);
        return $genderSafe;
    }


    public function generateBib($range)
    {
        $first = $this->ranges->find($range->id)->pivot->first;
        $last = $this->ranges->find($range->id)->pivot->last;
        $count = $this->ranges->find($range->id)->pivot->count;

        if ($last < $first) {
            $bib = $first;
        } else {
            $bib = $last + 1;
        }

        $this->ranges()->updateExistingPivot($range->id, ['last' => $bib, 'count' => $count + 1]);

        return $bib;
    }


    public function getCurrentRate($today)
    {
        return $this->rates()->where('start', '<', $today)->orderBy('start', 'desc')->first();
    }
}
