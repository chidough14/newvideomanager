<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
protected $guarded = [];

public function user(){
    return $this->belongsTo(User::class, 'user_id');
}

public function entries(){
    return $this->hasMany(PlaylistEntry::class);
}
}
