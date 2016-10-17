<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $dates = ['date'];


    public function engines()
    {
        return $this->hasMany('App\Engine');
    }


    public function tracks()
    {
        return $this->hasManyThrough('App\Track', 'App\Engine');
    }


    public function ranges()
    {
        return $this->hasManyThrough('App\Range', 'App\Engine');
    }


    public function getEventDisclaimerURL()
    {
        if (is_null($this->url_disclaimer)) {
            return url($this->prefix . '/docs/disclaimer');
        } else {
            return $this->url_disclaimer;
        }
    }


    public function getEventPrivacyURL()
    {
        if (is_null($this->url_privacy)) {
            return url($this->prefix . '/docs/privacy');
        } else {
            return $this->url_privacy;
        }
    }


    public function getEventParentalURL()
    {
        if (is_null($this->url_parental)) {
            return url($this->prefix . '/docs/parental');
        } else {
            return $this->url_parental;
        }
    }


    public function getDefaultLocation()
    {
        $defaultLocationArray = explode(',', $this->default_location);
        $defaultLocation['country'] = $defaultLocationArray[0];
        $defaultLocation['state'] = $defaultLocationArray[1];
        $defaultLocation['province'] = $defaultLocationArray[2];
        return $defaultLocation;
    }


    public function verboseMonth()
    {
        switch ($this->date->month) {
            case 1:
                $month = 'Enero';
                break;
            case 2:
                $month = 'Febrero';
                break;
            case 3:
                $month = 'Marzo';
                break;
            case 4:
                $month = 'Abril';
                break;
            case 5:
                $month = 'Mayo';
                break;
            case 6:
                $month = 'Junio';
                break;
            case 7:
                $month = 'Julio';
                break;
            case 8:
                $month = 'Agosto';
                break;
            case 9:
                $month = 'Setiembre';
                break;
            case 10:
                $month = 'Octubre';
                break;
            case 11:
                $month = 'Noviembre';
                break;
            case 12:
                $month = 'Diciembre';
                break;
            default:
                $month = '';
        }

        return $month;
    }


    public function longDate()
    {
        return $this->date->day . ' de ' . $this->verboseMonth() . ' de ' . $this->date->year;
    }


    static public function makeDummy()
    {
        $event = new self();

        $event->id = 0;
        $event->prefix = '';
        $event->pre = '';
        $event->name = '';
        $event->date = Carbon::now();

        return $event;
    }


}
