<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{

    public function event()
    {
        return $this->belongsTo('App\Event');
    }


    public function tracks()
    {
        return $this->hasMany('App\Track');
    }


    public function ranges()
    {
        return $this->hasMany('App\Range');
    }


    public function codes()
    {
        return $this->hasManyThrough('App\Code', 'App\Range');
    }


    public function gateways()
    {
        return $this->belongsToMany('App\Gateway');
    }


    public function getSafeTracks($age, $year, $gender)
    {
        $availableTracks = collect();
        foreach ($this->tracks as $track){
            $categorySafe = $track->categorySafe($age, $year);
            $genderSafe = $track->genderSafe($gender);
            if ($categorySafe == true && $genderSafe == true) {
                $availableTracks->push($track);
            }
        }
        return $availableTracks;
    }


    public function closestYear()
    {
        $eventYear = $this->event->date->year;
        $closestYear = 0;

        if($this->assign_method == 'onYear'){
            foreach ($this->tracks as $track){
                if($track->categories->max('min') > $closestYear){
                    $closestYear = $track->categories->max('min');
                }
            }
        }else{
            foreach ($this->tracks as $track){
                if($eventYear - $track->categories->min('min') > $closestYear){
                    $closestYear = $eventYear - $track->categories->min('min');
                }
            }
        }

        return $closestYear;
    }


    public function fartherYear()
    {
        $eventYear = $this->event->date->year;
        $fartherYear = $eventYear;

        if($this->assign_method == 'onYear'){
            foreach ($this->tracks as $track){
                if($track->categories->min('max') < $fartherYear){
                    $fartherYear = $track->categories->min('max');
                }
            }
        }else{
            foreach ($this->tracks as $track){
                if($eventYear - $track->categories->max('max') < $fartherYear){
                    $fartherYear = $eventYear - $track->categories->max('max');
                }
            }
        }

        return $fartherYear;
    }
}
