<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductStockReception extends Pivot
{
    use SoftDeletes;
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    protected $table = 'product_stock_receptions';

    protected $fillable = ['product_quantity', "stock_reception_id", "product_id"];

    protected $guarded = ['stock_reception_id', 'product_id'];
}
