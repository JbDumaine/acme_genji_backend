<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockReception extends Model
{

    use SoftDeletes;

    protected $table = 'stock_receptions';

    protected $fillable = ['reception_number', 'reception_date','supplier_id', 'store_id','supplier_id', 'store_id'];

    // Method allowing to recover supplier of stock's reception.
    public function supplier()
    {
        return $this->belongsTo('\App\Models\Supplier');
    }

    // Method allowing to recover products of stock's reception.
    public function products()
    {
        return $this->belongsToMany('\App\Models\Product')->using('\App\Models\ProductStockReception');
    }
}
