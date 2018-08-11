<?php

namespace App\Models;

use App\Business;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Tailor extends Authenticatable
{
    use Notifiable;
    protected $guard = 'tailor';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = ['name', 'email', 'password',];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token',];

    public function stores()
    {
        return $this->hasMany(Store::class);
    }

    public function designs()
    {
        return $this->hasManyThrough(Design::class, Store::class);
    }

}
