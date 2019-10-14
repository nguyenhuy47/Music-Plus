<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    public function song()
    {
        return $this->hasMany('App\Model\Song');
    }
}
