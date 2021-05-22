<?php

namespace App\Http\Livewire;

use App\Species;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use App\Traits\Sluggable;

class SearchSpecies extends Component
{
    use Sluggable;
    public $search = '';

    public function boot() {
        return $this->search = $this->generateSearchString();
    }

    public function render()
    {
        $count = Species::count();
        $speciesResultsCollection = new \Illuminate\Database\Eloquent\Collection;
        if (strlen($this->search) >= 3 ) {
            $cacheKey = 'search-string-' . $this->createSlug($this->search);
            if (Cache::has($cacheKey)) {
                $speciesResultsCollection = Cache::get($cacheKey);
            } else {
                $searchTerm = trim($this->search);
                $speciesResultsCollection = $speciesResultsCollection->merge(Species::where('species', "like", '%' . $searchTerm . '%')->get());
                $speciesResultsCollection = $speciesResultsCollection->merge(Species::where('species', "like", $searchTerm . '%')->get());
                $speciesResultsCollection = $speciesResultsCollection->merge(Species::where('species', "like", '%' . $searchTerm)->get());
                $speciesResultsCollection = $speciesResultsCollection->merge(Species::where('common_name', 'like', $searchTerm . '%')->get());
                $speciesResultsCollection = $speciesResultsCollection->merge(Species::where('common_name', 'like', '%' . $searchTerm)->get());
                $speciesResultsCollection = $speciesResultsCollection->merge(Species::where('common_name', 'like', '%' . $searchTerm . '%')->get());
                $speciesResultsCollection = $speciesResultsCollection->merge(Species::where('subspecies', 'like', $searchTerm . '%')->get());
                $speciesResultsCollection = $speciesResultsCollection->merge(Species::where('subspecies', 'like', '%' . $searchTerm)->get());
                $speciesResultsCollection = $speciesResultsCollection->merge(Species::where('subspecies', 'like', '%' . $searchTerm . '%')->get());
                Cache::put($cacheKey, $speciesResultsCollection, 31540000);
            }
        }
        return view('livewire.search-species', ['species' => $speciesResultsCollection, 'count' => $count]);
    }
}
