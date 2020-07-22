<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use SoftDeletes;

    protected $table = 'categories';

    protected $fillable = ['name', 'description'];

    protected $guarded = [];

    // Method allowing to recover products by category.
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

}
