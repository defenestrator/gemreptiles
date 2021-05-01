<div class="container p-6">
    <div class="p-12 bg-white rounded-md">
    <h3 class="text-2xl font-serif">
        Search for Species
    </h3>
        <input wire:model="search" type="text" placeholder="Search species..."/>
    </div>
    <div class="p-12 text-left">
        <ul>
        @foreach($species as $specie)
            <li class="flex-row p-4">
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
