<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Design extends Model implements HasMedia
{
    protected $guarded = [];

    use HasMediaTrait;

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function tailor()
    {
        return $this->belongsTo(Tailor::class);
    }

}
