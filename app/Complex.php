<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\GeneratesUuid;
use Dyrynda\Database\Casts\EfficientUuid;

class Complex extends Model
{
    use HasFactory;

    public function morph()
    {
        return $this->belongsToMany(Morph::class);
    }
}
