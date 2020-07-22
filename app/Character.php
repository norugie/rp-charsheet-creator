<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $dates = [ 'published_at' ];

    public function author ()
    {
        return $this->belongsTo( 'App\User' );
    }

    public function images ()
    {
        return $this->hasMany( 'App\Images', 'char_id' );
    }
}
