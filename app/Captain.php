<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Captain extends Model
{
    public function images()
    {
        $this->belongsToMany('App\Image');
    }
}
