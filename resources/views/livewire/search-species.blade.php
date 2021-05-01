<div class="container mx-auto p-6">
    <div class="p-4 px-6 bg-white rounded-md shadow-lg">
        <h3 class="text-2xl font-serif mb-2">
            Search for Species @if(count($species) > 0) <span class="text-sm content-center">{{ count($species) . ' results'}}</span>@endif
        </h3>
        <input class="rounded-md form-input border-green-600 focus:border-green-400" style="--tw-ring-color: rgba(5, 150, 105, var(--tw-border-opacity));" wire:model="search" type="text" placeholder="Search species..."/>
        @if(count($species) > 0)
        <div class="text-left pt-4">
            <ul class="">
            @foreach($species as $specie)
                <li class="flex-row rounded-lg bg-green-50 shadow py-4 px-2 m-4">
                    <div class="flex-auto text-2xl">
                        <a class="text-green-800 hover:text-green-600" href="/species/{{ $specie->id }}">
                            {{ $specie->species }}
                            @if($specie->type_species == true)
                                <span class="flex-auto text-sm text-yellow-900 opacity-80">
                                    type species
                                </span>
                            @endif
                        </a>
                    </div>
                    @if($specie->type_species == true)
                        <div class="flex-auto text-yellow-900 opacity-80">

                        </div>
                    @endif

                    @if($specie->common_name)
                    <div class="flex-auto"><span class="text-gray-700">Common names:</span>
                        <div class="flex-auto">
                            {{-- <a class="text-green-800 hover:text-green-600" href="/species/{{ $specie->id }}"> --}}
                                {{ $specie->common_name }}
                            {{-- </a> --}}
                        </div>
                    </div>
                    @endif
                    @if($specie->subspecies)
                    <div class="flex-auto"><span class="text-gray-700">Subspecies:</span>
                        <div class="flex-auto">
                            {{-- <a class="text-green-800 hover:text-green-600" href="/species/{{ $specie->id }}"> --}}
                                {{ $specie->subspecies }}
                            {{-- </a> --}}
                        </div>
                    </div>
                    @endif

                </li>
            @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
