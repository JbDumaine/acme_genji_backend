<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCommand extends Model
{
    
    use SoftDeletes;

    protected $table = 'product_commands';

    protected $fillable = ['product_quantity'];

    protected $guarded = ['command_id', 'product_id'];

    // Method allowing to recover command of product command.
    public function getCommand()
    {
        return $this->belongsTo('\App\Models\Command', 'command_id', 'id');
    }

    // Method allowing to recover product of product command.
    public function getProduct()
    {
        return $this->belongsTo('\App\Models\Product', 'product_id', 'id');
    }
}