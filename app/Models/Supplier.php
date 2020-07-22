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
    public function city()
    {
        return $this->belongsTo('\App\Models\City');
    }

    // Method allowing to recover products by supplier.
    public function products()
    {
        return $this->hasMany('App\Models\Supplier');
    }

    // Method allowing to recover stock's receptions by supplier.
    public function stockReceptions()
    {
        return $this->hasMany('App\Models\StockReception');
    }

}
