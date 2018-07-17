<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Measurement
 * @package App
 */
class Measurement extends Model
{


    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
