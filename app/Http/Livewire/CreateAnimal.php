<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Animal;

class CreateAnimal extends Component
{
    public function render()
    {
        return view('livewire.create-animal');
    }
}
