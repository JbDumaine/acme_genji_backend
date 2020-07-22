<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockReception extends Model
{
    
    use SoftDeletes;

    protected $table = 'stock_receptions';

    protected $fillable = ['reception_number', 'reception_date'];

    protected $guarded = ['supplier_id', 'store_id'];

    // Method allowing to recover supplier of stock reception.
    public function getSupplier()
    {
        return $this->belongsTo('\App\Models\Supplier', 'supplier_id', 'id');
    }

    // Method allowing to recover store of stock reception.
    public function getStore()
    {
        return $this->belongsTo('\App\Models\Store', 'store_id', 'id');
    }
}