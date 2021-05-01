<div class="container mx-auto p-6">
    <div class="p-4 px-6 bg-white rounded-md shadow-lg">
        <h3 class="text-2xl font-serif mb-2">
            Search for Species
        </h3>
        <input class="rounded-md form-input border-green-600 focus:border-green-400" style="--tw-ring-color: rgba(5, 150, 105, var(--tw-border-opacity));" wire:model="search" type="text" placeholder="Search species..."/>

        <div class="text-left pt-4">
            <ul class="bottom-border border-green-900">
            @foreach($species as $specie)
                <li class="flex-row border-bottom border-green-900 py-4 px-1">
                    <div class="flex-auto text-2xl">
                        <a class="text-green-800 hover:text-green-600" href="/species/{{ $specie->id }}">
                            {{ $specie->species }}
                        </a>
                    </div>
                    @if($specie->common_name)
                    <div class="flex-auto">Common names:
                        <div class="flex-auto">
                            <a class="text-green-800 hover:text-green-600" href="/species/{{ $specie->id }}">
                                {{ $specie->common_name }}
                            </a>
                        </div>
                    </div>
                    @endif
                    @if($specie->subspecies)
                    <div class="flex-auto">Subspecies:
                        <div class="flex-auto">
                            <a class="text-green-800 hover:text-green-600" href="/species/{{ $specie->id }}">
                                {{ $specie->subspecies }}
                            </a>
                        </div>
                    </div>
                    @endif
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
