<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\GeneratesUuid;
use App\Traits\Sluggable;

class Animal extends Model
{
    use HasFactory, Sluggable, GeneratesUuid;

    protected $casts = [
        'uuid' => EfficientUuid::class,
    ];

}
