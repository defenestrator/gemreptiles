<div class="max-w-7xl mx-auto sm:py-6 px-0 sm:px-6">

    <div class="p-6 bg-white border-b border-gray-200 sm:rounded shadow-lg">
        <h3 class="text-xl font-serif mb-2">
            Search for Reptiles
            @if(count($species) > 0 && count($species) != 1)
            <span class="text-sm content-center font-sans text-yellow-700"> {{ count($species) . ' results'}}</span>
            @elseif(count($species) == 1)
            <span class="text-sm content-center font-sans text-yellow-700"> {{ count($species) . ' result'}}</span>
            @else
            <span class="text-sm content-center font-sans text-yellow-700"> {{$count}} species</span>
            @endif
        </h3>

        <input class="rounded-md form-input
            border-green-500 focus:border-green-400"
            style="--tw-ring-color: rgba(59, 125, 43);" id="search-species" wire:model="search" type="text" placeholder="Search species..."/>
        <button class="rounded bg-transparent py-1 px-2 text-gray-500" onclick="clearSearch()">clear</button>

        @if(count($species) > 0)
        <div class="text-left pt-4">
            <div class="grid gap-2 grid-cols-2">
            @foreach($species as $specie)
                <div class="rounded-lg bg-green-50 border shadow py-4 px-4 mx-1 my-2 overflow-hidden max-h-96">
                    <div class="block text-xl font-serif overflow-hidden">
                        <a class="text-green-700 hover:text-green-500" href="/species/{{ $specie->id }}">
                            {{ $specie->species }}
                        </a>
                    </div>
                    <hr class="my-2 border-gray-300">
                    @if($specie->common_name)
                    <div class="block mt-1"><span class="text-yellow-900">Common names:</span>
                        <div class="">
                            {{ $specie->common_name }}
                        </div>
                    </div>
                    @endif
                    @if($specie->subspecies)
                    <div class="block mt-2"><span class="text-yellow-900">Subspecies:</span>
                        <div class="">
                            {{ $specie->subspecies }}
                        </div>
                    </div>
                    @endif
                </div>
            @endforeach
            </div>
        </div>
        @endif
        <p class="mt-4 p-2">
            Our species search was built using data from the worldwide
            <a class="text-green-500" href="http://www.reptile-database.org/" title="The Reptile Database">
                reptile species database</a>,
                which serves as an academic reference on extant reptile species.
        </p>

            <p class="my-4 p-2">The current representation uses the latest consensus of worldwide herpetologists available, via the
            <a class="text-green-500" href="http://www.reptile-database.org/data/" title="Reptile Species Checklist">
                reptile species checklist</a>,
                published December 14th, 2020.
        </p>
    </div>

    @if(Route::currentRouteName()  == 'welcome')
    <script>
        const terms = [
            'iguana',
            'boa',
            'cobra',
            'carpet python',
            'ball python',
            'crested',
            'snake',
            'toed',
            'Anolis',
            'Rhacodactylus',
            'Corn Snake',
            'Western Hognose',
            'Python',
            'tree',
            'Pituophis',
            'naja',
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
            'tortoise',
            'king',
            'turtle',
            'alligator',
            'night',
            'rainbow',
            'teiid',
            'chameleon',
            'rat',
            'gopher',
            'blattfinger'
        ];
        let searchInput = document.getElementById('search-species')
        searchInput.select()
        searchInput.value = ""
        function clearSearch() {
            searchInput.value = ""
            searchInput.select()
        }
        var text = terms[Math.floor(Math.random() * terms.length)];
        var l=text.length;
        var current = 0;
        var time = 100;
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
