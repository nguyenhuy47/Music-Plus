<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public function songs()
    {
        return $this->hasMany('/App/Model/Song');
    }
}
