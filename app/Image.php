<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function captains()
    {
        $this->belongsToMany('App\Captain');
    }
}
