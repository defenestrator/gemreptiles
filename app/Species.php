<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_species',
        'species',
        'subspecies',
        'author',
        'common_name',
        'higher_taxa',
        'species_number',
        'changes'
    ];
}
