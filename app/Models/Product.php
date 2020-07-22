<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;

    protected $fillable = ['name', 'description', 'unit_price', 'unit_weight', 'stock_quantity'];

    protected $guarded = ['supplier_id', 'category_id'];

    // Method allowing to recover category of product.
    public function category()
    {
        return $this->belongsTo('\App\Models\Category');
    }

    // Method allowing to recover supplier of product.
    public function supplier()
    {
        return $this->belongsTo('\App\Models\Supplier');
    }

    // Method allowing to recover commands of product.
    public function commands()
    {
        return $this->belongsToMany('\App\Models\Command')->using('\App\Models\ProductCommand');
    }

    // Method allowing to recover stock's Reception of product.
    public function stockReceptions()
    {
        return $this->belongsToMany('\App\Models\StockReception')->using('\App\Models\ProductStockReception');
    }
}
