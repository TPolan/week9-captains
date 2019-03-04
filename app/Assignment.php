<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        "subject ",
        "description",
        "captain_id",
        "user_id"
    ];
}
