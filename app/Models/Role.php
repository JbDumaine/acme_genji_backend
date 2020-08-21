<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $table = 'roles';

    protected $fillable = ['name'];


    // Method allowing to recover users by role.
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
