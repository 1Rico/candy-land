<?php

namespace App\Models;

use App\Models\Tailor;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = ['name', 'email', 'password',];

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function tailor()
    {
        return $this->belongsTo(Tailor::class);
    }

    public function designs()
    {
        return $this->hasMany(Design::class);
    }

    /**
     * @return mixed
     */
    public function isActive()
    {
        return $this->status;
    }

}
