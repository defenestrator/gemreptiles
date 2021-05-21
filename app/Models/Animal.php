<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\GeneratesUuid;
use Dyrynda\Database\Casts\EfficientUuid;
use App\Traits\Sluggable;

class Animal extends Model
{
    use HasFactory, Sluggable, GeneratesUuid;

    protected $casts = [
        'uuid' => EfficientUuid::class,
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
