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
    public function getCity()
    {
        return $this->belongsTo('\App\Models\City', 'city_id', 'id');
    }
}