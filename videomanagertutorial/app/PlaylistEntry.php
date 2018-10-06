<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaylistEntry extends Model
{
    protected $guarded = [];

    public function playlist(){
        return $this->belongsTo(Playlist::class, 'playlist_id');
    }
}
