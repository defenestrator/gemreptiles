<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\GeneratesUuid;

class Brood extends Model
{
    use HasFactory;

    public function pairing()
    {
        return $this->belongsToMany(Pairing::class);
    }
}
