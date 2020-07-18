<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductStockReception extends Model
{
    
    use SoftDeletes;

    protected $table = 'product_stock_receptions';

    protected $fillable = ['product_quantity'];

    protected $guarded = [];

    // Method allowing to recover category of product.
    public function getStockReception()
    {
        return $this->belongsTo('\App\Models\StockReception', 'stock_reception_id', 'id');
    }

    // Method allowing to recover supplier of product.
    public function getProduct()
    {
        return $this->belongsTo('\App\Models\Product', 'product_id', 'id');
    }
}