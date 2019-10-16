<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public function singer()
    {
        return $this->belongsTo('App\Model\Singer');

    }

    public function category()
    {
        return $this->belongsTo('App\Model\Category');

    }

    public function artist()
    {
        return $this->belongsTo('App\Model\Artist');

    }

    public function user()
    {
        return $this->belongsTo('App\User');

    }
}
