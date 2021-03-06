<x-guest-layout>
<div class="p-6 sm:px-20 bg-white border-b border-gray-200 min-h-screen">
    <x-slot name="header">
        <button onclick="window.history.back()">
           <img src="/favicon-100.png" alt="Gem State Reptiles Logo">
        </button>

    </x-slot>
    <div class="max-w-3xl rounded-lg bg-green-50 shadow py-4 px-2 my-2">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ $species->species }}
        </h2>
        @if($species->type_species == true)
            <div class="text-sm flex-auto text-yellow-900">
                 &mdash; Type Species &mdash;
            </div>
        @endif
        <hr class="my-2">
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
