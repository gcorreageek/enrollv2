<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garment extends Model
{

    public function tracks()
    {
        return $this->hasMany('App\Track');
    }


    public function sizes()
    {
        return $this->belongsToMany('App\Size')->withPivot('gender', 'stock', 'spent');
    }


    public function grabSize($size, $runner)
    {
        $spent = $this->sizes()->wherePivot('gender', $runner->gender)->find($size->id)->pivot->spent;
        $this->sizes()->wherePivot('gender', $runner->gender)->updateExistingPivot($size->id, ['spent' => $spent + 1]);
    }


    public function returnSize($size, $runner)
    {
        $spent = $this->sizes()->wherePivot('gender', $runner->gender)->find($size->id)->pivot->spent;
        $this->sizes()->wherePivot('gender', $runner->gender)->updateExistingPivot($size->id, ['spent' => $spent - 1]);
    }
}
