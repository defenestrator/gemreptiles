<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Animal as Critter;

class Animal extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.animal', [
            'animals' => Critter::where('pet_name', $this->search)->whereUserId(Auth::user()->id)->get(),
        ]);
    }
}
