<div class="container mx-auto p-6">
    <div class="p-4 px-6 bg-white rounded-md shadow-lg">
        <h3 class="text-xl font-serif mb-2">
            Search for Reptiles
            @if(count($species) > 0)
            <span class="text-sm content-center font-sans text-yellow-700"> {{ count($species) . ' results'}}</span>
            @elseif(count($species) > 0)
            <span class="text-sm content-center font-sans text-yellow-700"> {{ count($species) . ' result'}}</span>
            @else
            <span class="text-sm content-center font-sans text-yellow-700"> {{$count}} species</span>
            @endif
        </h3>

        <input class="rounded-md form-input
            border-green-600 focus:border-green-400"
            style="--tw-ring-color: rgba(5, 150, 105);" id="search-species" wire:model="search" type="text" placeholder="Search species..."/>

        @if(count($species) > 0)
        <div class="text-left pt-4">
            <ul class="">
            @foreach($species as $specie)
                <li class="flex-row rounded-lg bg-green-50 shadow py-4 px-2 m-4">
                    <div class="flex-auto text-2xl">
                        <a class="text-green-800 hover:text-green-600" href="/species/{{ $specie->id }}">
                            {{ $specie->species }}
                        </a>
                    </div>
                    @if($specie->type_species == true)
                        <div class="flex-auto text-xs text-yellow-800">
                            Type Species
                        </div>
                    @endif
                    @if($specie->common_name)
                    <div class="flex-auto"><span class="text-gray-700">Common names:</span>
                        <div class="flex-auto">
                            {{ $specie->common_name }}
                        </div>
                    </div>
                    @endif
                    @if($specie->subspecies)
                    <div class="flex-auto"><span class="text-gray-700">Subspecies:</span>
                        <div class="flex-auto">
                            {{ $specie->subspecies }}
                        </div>
                    </div>
                    @endif
                </li>
            @endforeach
            </ul>
        </div>
        @endif
    </div>

    @if(Route::currentRouteName()  == 'welcome')
    <script>
        const terms = [
            'iguana',
            'boa',
            'cobra',
            'Anolis',
            'Rhacodactylus',
            'Corn Snake',
            'Western Hognose',
            'Python',
            'tree',
            'Pituophis',
            'rattlesnake',
            'Abronia',
            'Flying',
            'Dragon',
            'monitor',
            'agama',
            'bicolor',
            'unicorn',
            'gecko',
            'monster',
            'night',
            'rainbow',
            'teiid',
            'chameleon',
            'rat',
            'gopher'
        ];
        let searchInput = document.getElementById('search-species')
        searchInput.select()
        searchInput.value = ""
        var text = terms[Math.floor(Math.random() * terms.length)];
        var l=text.length;
        var current = 0;
        var time = 120;
        var writeText = function() {
            searchInput.value+=text[current];
            if(current < l-1) {
                current++;
                setTimeout(function(){writeText()},time);
                searchInput.dispatchEvent(new Event('input'));
            } else {
                searchInput.setAttribute('value',searchInput.value);
                searchInput.dispatchEvent(new Event('input'));
            }
        }
    window.onload =  function (event){
        setTimeout(function(){writeText()},time);
    };
</script>
@endif
</div>
