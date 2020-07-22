<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    
    use SoftDeletes;

    protected $fillable = ['name', 'adress'];

    protected $guarded = ['city_id'];

    // Method allowing to recover city of supplier.
    public function getCity()
    {
        return $this->belongsTo('\App\Models\City', 'city_id', 'id');
    }

}