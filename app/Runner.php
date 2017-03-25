<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
            'ticket',
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


    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }


    public function values()
    {
        return $this->hasMany('App\Value');
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


    public function longGender()
    {
        if($this->gender == 'M') {
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


    static public function cleanDuplicates()
    {

        $currentDuplicateDoc = '';
        $masterID = '';

        $duplicates = DB::select("SELECT id, doc_num, gender, dob, updated_at FROM runners WHERE doc_num IN (SELECT doc_num FROM runners GROUP BY doc_num HAVING COUNT(doc_num) > 1) order by doc_num");

        foreach ($duplicates as $duplicate) {
            if ($duplicate->doc_num != $currentDuplicateDoc) {
                $currentDuplicateDoc = $duplicate->doc_num;
                $masterID = $duplicate->id;
            }

            DB::update('update runner_track set runner_id = ? where runner_id = ?', [$masterID, $duplicate->id]);
        }


    }


}
