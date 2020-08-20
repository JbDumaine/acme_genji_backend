<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Command extends Model
{

    use SoftDeletes;

    protected $fillable = ['command_number', 'delivery_date','store_id', 'state_id'];


    // Method allowing to recover state of command.
    public function state()
    {
        return $this->belongsTo('\App\Models\State');
    }

    // Method allowing to recover store of command.
    public function store()
    {
        return $this->belongsTo('\App\Models\Store');
    }

    // Method allowing to recover products of command.
    public function products()
    {
        return $this->belongsToMany('\App\Models\Product', 'product_commands');
    }

    public function saveProductsCommand($id, $productsStockArray)
    {
        foreach ($productsStockArray as $productStock) {
            $productCommand = new ProductCommand($productStock);
            $productCommand->command_id = $id;
            if (!$productCommand->save()) {
                return null;
            }
            $product = Product::find($productStock['product_id']);
            $product->stock_quantity -= $productCommand->product_quantity;
            if (!$product->save()) {
                return null;
            }
        }
        return true;
    }
}
