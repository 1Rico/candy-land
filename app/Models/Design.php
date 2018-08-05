<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Design extends Model implements HasMedia
{
    protected $guarded = [];

    use HasMediaTrait;

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10)
        ->withResponsiveImages();
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function tailor()
    {
        return $this->belongsTo(Tailor::class);
    }

}
