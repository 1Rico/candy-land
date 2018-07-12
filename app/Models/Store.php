<?php

namespace App\Models;

use App\Models\Tailor;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function owner()
    {
        return $this->belongsTo(Tailor::class);
    }
}
