<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'unit_price', 'unit_weight', 'stock_quantity', 'category_id'];

    protected $guarded = ['supplier_id'];

    // Method allowing to recover category of product.
    public function getCategory()
    {
        return $this->belongsTo('\App\Models\Category', 'category_id', 'id');
    }

    // Method allowing to recover supplier of product.
    public function getSupplier()
    {
        return $this->belongsTo('\App\Models\Supplier', 'supplier_id', 'id');
    }
}
