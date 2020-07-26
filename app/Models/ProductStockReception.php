<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductStockReception extends Pivot
{

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    protected $table = 'product_stock_receptions';

    protected $fillable = ['product_quantity'];

    protected $guarded = ['stock_reception_id', 'product_id'];
}
