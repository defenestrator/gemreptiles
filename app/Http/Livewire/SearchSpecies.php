<?php

namespace App\Http\Livewire;

use App\Models\Species;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use App\Traits\Sluggable;

class SearchSpecies extends Component
{
    use Sluggable;
    public $search = '';

    public function render()
    {
        $all = new \Illuminate\Database\Eloquent\Collection;

        if (strlen($this->search) >= 3 ) {
            $cacheKey = 'search-string-' . $this->createSlug(strtolower($this->search));
            if (Cache::has($cacheKey)) {
                $all = Cache::get($cacheKey);
            } else {
                $searchTerm = trim($this->search);
                $all = $all->merge(Species::where('species', "like", '%' . $searchTerm . '%')->get());
                $all = $all->merge(Species::where('species', "like", $searchTerm . '%')->get());
                $all = $all->merge(Species::where('species', "like", '%' . $searchTerm)->get());
                $all = $all->merge(Species::where('common_name', 'like', $searchTerm . '%')->get());
                $all = $all->merge(Species::where('common_name', 'like', '%' . $searchTerm)->get());
                $all = $all->merge(Species::where('common_name', 'like', '%' . $searchTerm . '%')->get());
                $all = $all->merge(Species::where('subspecies', 'like', $searchTerm . '%')->get());
                $all = $all->merge(Species::where('subspecies', 'like', '%' . $searchTerm)->get());
                $all = $all->merge(Species::where('subspecies', 'like', '%' . $searchTerm . '%')->get());
                Cache::put($cacheKey, $all, 31540000);
            }
        }
        return view('livewire.search-species', ['species' => $all]);
    }
}
