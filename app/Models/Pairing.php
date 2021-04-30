<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\GeneratesUuid;

class Pairing extends Model
{
    use HasFactory;

    public function dam()
    {
        return $this->hasOne(Animal::class);
    }

        public function sire()
    {
        return $this->hasMany(Animal::class);
    }
}
