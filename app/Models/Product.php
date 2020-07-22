<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product';

    protected $fillable = ['name', 'description', 'unit_price', 'unit_weight', 'stock_quantity'];

    protected $guarded = [];
}
