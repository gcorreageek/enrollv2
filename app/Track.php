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
            'id',
            'bib',
            'ticket',
            'enrolled',
            'enabled',
            'error',
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
            'comment',
            'log'
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


    public function fields()
    {
        return $this->hasMany('App\Field');
    }


    public function categorySafe($age, $year, $gender)
    {
        if($this->engine->assign_method == 'onYear'){
            $categorySafe = $this->categories()->where([['min', '>=', $year], ['max', '<=', $year]])->whereIn('gender', [$gender, 'X'])->get()->count() > 0;
        }else{
            $categorySafe = $this->categories()->where([['min', '<=', $age], ['max', '>=', $age]])->whereIn('gender', [$gender, 'X'])->get()->count() > 0;
        }
        return $categorySafe;
    }


    public function assignCategory($age, $year, $range_id)
    {
        if($this->engine->assign_method == 'onYear'){
            if ($this->categories()->where([['min', '>=', $year], ['max', '<=', $year]])->count() > 1) {
                $category = $this->categories()->where([['min', '>=', $year], ['max', '<=', $year], ['range_id', $range_id]])->first();
            } else {
                $category = $this->categories()->where([['min', '>=', $year], ['max', '<=', $year]])->first();
            }
        }else{
            if ($this->categories()->where([['min', '<=', $age], ['max', '>=', $age]])->count() > 1) {
                $category = $this->categories()->where([['min', '<=', $age], ['max', '>=', $age], ['range_id', $range_id]])->first();
            } else {
                $category = $this->categories()->where([['min', '<=', $age], ['max', '>=', $age]])->first();
            }
        }
        return $category;
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
