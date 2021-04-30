<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Morph extends Model
{
    use HasFactory;

    public function morph()
    {
        return $this->belongsToMany(Morph::class);
    }
}
