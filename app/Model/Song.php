<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public function singer()
    {
        return $this->belongsTo('App\Model\Singer');
    }
}
