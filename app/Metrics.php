<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metrics extends Model
{
    protected $table = 'metrics';
    public $timestamps = false;
    protected $fillable = ['id', 'userid', 'repoid', 'referers', 'paths', 'views', 'clones'];

    public function repo()
    {
        return $this->belongsTo('App\Repo', 'repoid');
    }
}
