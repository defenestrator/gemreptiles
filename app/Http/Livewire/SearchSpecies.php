<?php

namespace App\Http\Livewire;

use App\Models\Species;
use Livewire\Component;

class SearchSpecies extends Component
{
    public $search = '';

    public function render()
    {
        $all = new \Illuminate\Database\Eloquent\Collection;
        if (strlen($this->search) > 3 ) {
            $all = $all->merge(Species::where('species', "like", '%' . $this->search . '%')->get());
            $all = $all->merge(Species::where('species', "like", $this->search . '%')->get());
            $all = $all->merge(Species::where('species', "like", '%' . $this->search)->get());
            $all = $all->merge(Species::where('common_name', 'like', $this->search . '%')->get());
            $all = $all->merge(Species::where('common_name', 'like', '%' . $this->search)->get());
            $all = $all->merge(Species::where('common_name', 'like', '%' . $this->search . '%')->get());
        }

        return view('livewire.search-species', ['species' => $all]);
    }
}
