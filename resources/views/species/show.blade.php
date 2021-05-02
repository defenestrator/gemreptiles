<x-guest-layout>
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
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
</div>
<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">

</div>
</x-guest-layout>
