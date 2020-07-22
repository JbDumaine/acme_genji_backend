<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Command extends Model
{
    
    use SoftDeletes;

    protected $fillable = ['command_number', 'delivery_date', 'state_id'];

    protected $guarded = ['store_id'];

    // Method allowing to recover state of command.
    public function getState()
    {
        return $this->belongsTo('\App\Models\State', 'state_id', 'id');
    }

    // Method allowing to recover store of command.
    public function getStore()
    {
        return $this->belongsTo('\App\Models\Store', 'store_id', 'id');
    }
}