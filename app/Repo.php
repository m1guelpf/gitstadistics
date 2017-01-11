<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repo extends Model
{
    public $timestamps = false;
    
    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'userid');
    }
}
