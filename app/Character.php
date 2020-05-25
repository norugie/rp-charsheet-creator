<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    public function author ()
    {
        return $this->belongsTo( 'App\User' );
    }

    public function images ()
    {
        return $this->hasMany( 'App\Images', 'char_id' );
    }
}
