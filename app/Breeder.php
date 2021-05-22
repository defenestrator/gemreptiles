<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\GeneratesUuid;
use Dyrynda\Database\Casts\EfficientUuid;

class Breeder extends Model
{
    use HasFactory, GeneratesUuid;

    protected $casts = [
        'uuid' => EfficientUuid::class,
    ];
}
