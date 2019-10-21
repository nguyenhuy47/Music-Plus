<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public function singers()
    {
        return $this->belongsToMany('App\Model\Singer');

    }

    public function category()
    {
        return $this->belongsTo('App\Model\Category');

    }

    public function artists()
    {
        return $this->belongsToMany('App\Model\Artist');

    }

    public function user()
    {
        return $this->belongsTo('App\User');

    }
}
