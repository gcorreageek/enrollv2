<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Runner extends Model
{
    protected $dates = ['dob'];


    protected $fillable = [
        'name_last',
        'name_first',
        'gender',
        'dob',
        'doc_type',
        'doc_num',
        'mail',
        'telephone',
        'mobile',
        'country',
        'state',
        'province',
        'city',
        'blood',
        'allergies',
    ];


    public function tracks()
    {
        return $this->belongsToMany('App\Track')->withPivot([
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
        ])->withTimestamps();
    }


    static public function verboseGender($gender)
    {
        if($gender == 'M') {
            $verboseGender = 'Masculino';
        } else {
            $verboseGender = 'Femenino';
        }

        return $verboseGender;
    }


    static public function makeDummy()
    {
        $runner = new self();

        $runner->name_last = '';
        $runner->name_first = '';
        $runner->gender = '';
        $runner->dob = '';
        $runner->doc_type = '';
        $runner->doc_num = '';
        $runner->mail = '';
        $runner->telephone = '';
        $runner->mobile = '';
        $runner->country = '';
        $runner->state = '';
        $runner->province = '';
        $runner->city = '';
        $runner->blood = '';

        return $runner;
    }


    public function findTrackInCurrentEngine($engine)
    {
        foreach ($this->tracks as $track) {
            if ($track->engine_id == $engine->id) {
                $currentTrack = $track;
            }
        }

        return $currentTrack;
    }

}
