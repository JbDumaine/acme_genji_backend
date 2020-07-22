<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{

    use SoftDeletes;

    protected $fillable = ['name', 'address'];

    protected $guarded = ['city_id'];

    // Method allowing to recover city of store.
    public function city()
    {
        return $this->belongsTo('\App\Models\City');
    }

    // Method allowing to recover users by store.
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    // Method allowing to recover commands by store.
    public function commands()
    {
        return $this->hasMany('App\Models\Command');
    }
}
