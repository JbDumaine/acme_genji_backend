<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'supplier';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name'
    ];

    
}
