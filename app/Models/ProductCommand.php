<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductCommand extends Pivot
{

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    protected $table = 'product_commands';

    protected $fillable = ['product_quantity'];

    protected $guarded = ['command_id', 'product_id'];
}
