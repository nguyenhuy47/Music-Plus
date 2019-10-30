<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    public function songs()
    {
        return $this->belongsToMany('App\Model\Song');
    }

    public function commentList()
    {
        return $this->hasOne('App\Model\CommentList');
    }
}
