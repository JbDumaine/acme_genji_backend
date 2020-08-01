<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{

    use SoftDeletes;

    protected $table = 'cities';

    protected $fillable = ['name', 'postal_code'];


    // Method allowing to recover stores by city.
    public function stores()
    {
        return $this->hasMany('App\Models\Store');
    }

    // Method allowing to recover suppliers by city.
    public function suppliers()
    {
        return $this->hasMany('App\Models\Supplier');
    }
}
