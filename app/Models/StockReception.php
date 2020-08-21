<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;
use App\Models\ProductStockReception;

class StockReception extends Model
{

    use SoftDeletes;

    protected $table = 'stock_receptions';

    protected $fillable = ['reception_number', 'reception_date', 'supplier_id'];

    // Method allowing to recover supplier of stock's reception.
    public function supplier()
    {
        return $this->belongsTo('\App\Models\Supplier');
    }

    // Method allowing to recover products of stock's reception.
    public function products()
    {
        return $this->belongsToMany('\App\Models\Product', 'product_stock_receptions')->withPivot('product_quantity');
    }

    public function saveProductsStockReception($id, $productsStockArray)
    {
        foreach ($productsStockArray as $productStock) {
            $productStockReception = new ProductStockReception($productStock);
            $productStockReception->stock_reception_id = $id;
            if (!$productStockReception->save()) {
                return null;
            }
            $product = Product::find($productStock['product_id']);
            $product->stock_quantity += $productStockReception->product_quantity;
            if (!$product->save()) {
                return null;
            }
        }
        return true;
    }
}
