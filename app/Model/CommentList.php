<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CommentList extends Model
{
    public function song()
    {
        return $this->belongsTo('App\Model\Song');
    }

    public function playlist()
    {
        return $this->belongsTo('App\Model\Playlist');
    }

    public function singer()
    {
        return $this->belongsTo('App\Model\Singer');
    }

    public function comments()
    {
        return $this->hasMany('App\Model\Comment');
    }
}
