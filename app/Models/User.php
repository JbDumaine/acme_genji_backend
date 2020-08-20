<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{

    use HasApiTokens, Notifiable;

    // Check to use HasRole (use Spatie\Permission\Traits\HasRoles)
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * Default values for attributes
     * @var  array an array with attribute as key and default as value
     */
    protected $attributes = [
        'role_id' => 1,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','role_id','store_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Method allowing to recover store of user.
    public function getStore()
    {
        return $this->belongsTo('\App\Models\Store');
    }
}
