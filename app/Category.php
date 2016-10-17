<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    static public function makeDummy()
    {
        $category = new self();

        $category->id = 0;
        $category->track_id = 0;
        $category->min = 0;
        $category->max = 0;
        $category->description = '';

        return $category;
    }


    public function title()
    {
        if ($this->description == '' || is_null($this->description)) {
            $title = $this->min . '-' . $this->max;
        } else {
            $title = $this->description;
        }

        return $title;
    }

}
