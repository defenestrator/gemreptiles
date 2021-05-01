<div class="p-6">
    <div class="p-6">
    <h3 class="text-2xl font-serif">
        Search for Species
    </h3>
        <input wire:model="search" type="text" placeholder="Search species..."/>
    </div>
    <div class="p-6">
        <ul>
        @foreach($species as $specie)
            <li class="flex-row p-4">
                <div class="flex text-2xl">
                    Species:
                    <a class="text-green-800" href="/species/{{ $specie->id }}">
                        {{ $specie->species }}
                    </a>
                </div>
                @if($specie->common_name)
                <div class="flex">Common names: {{ $specie->common_name }}</div>
                @endif
            </li>
        @endforeach
        </ul>
    </div
</div>
