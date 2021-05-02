<x-guest-layout>
<div class="p-6 sm:px-20 bg-white border-b border-gray-200 min-h-screen">
    <div class="flex-row rounded-lg bg-green-50 shadow py-4 px-2 m-4">
        <div class="flex-auto text-2xl">
            <a class="text-green-800 hover:text-green-600" href="/species/{{ $species->id }}">
                {{ $species->species }}
            </a>
        </div>
        @if($species->type_species == true)
            <div class="flex-auto text-xs text-yellow-800">
                Type Species
            </div>
        @endif
        @if($species->common_name)
        <div class="flex-auto"><span class="text-yellow-700">Common names:</span>
            <div class="flex-auto">
                {{ $species->common_name }}
            </div>
        </div>
        @endif
        @if($species->subspecies)
        <div class="flex-auto"><span class="text-yellow-700">Subspecies:</span>
            <div class="flex-auto">
                {{ $species->subspecies }}
            </div>
        </div>
        @endif

        @if(strlen($species->author) > 0)
        <div class="flex-auto"><span class="text-yellow-700">Author:</span>
            <div class="flex-auto">
                {{ $species->author }}
            </div>
        </div>
        @endif

        @if($species->higher_taxa)
        <div class="flex-auto"><span class="text-yellow-700">Higher Taxa:</span>
            <div class="flex-auto">
                {{ $species->higher_taxa }}
            </div>
        </div>
        @endif

        @if($species->changes)
        <div class="flex-auto"><span class="text-gray-700">Changes:</span>
            <div class="flex-auto">
                {{ $species->changes }}
            </div>
        </div>
        @endif
            @if($species->number)
        <div class="flex-auto"><span class="text-gray-700">species #:</span>
            <div class="flex-auto">
                {{ $species->number }}
            </div>
        </div>
        @endif
    </div>
</div>
<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">

</div>
</x-guest-layout>
