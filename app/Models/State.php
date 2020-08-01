<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{

    use SoftDeletes;

    protected $fillable = ['name'];


    // Method allowing to recover commands by state.
    public function commands()
    {
        return $this->hasMany('App\Models\Command');
    }
}
