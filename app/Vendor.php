<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Sluggable;

class Vendor extends Model
{
    use HasFactory, Sluggable;

    /**
     * Get the post's image.
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
