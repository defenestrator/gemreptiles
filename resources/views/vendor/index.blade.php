<x-guest-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vendors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @foreach ($vendors as $vendor)
                <div class="m-4">
                <li class="flex-row flex flex-grow style="list-style-type:none;">
                    <div class="mr-4 flex-1 content-end">{{$vendor->name}} </div>
                    <div class="mr-4 flex-1 content-start"><img style="width:50px" src="{{$vendor->image->url}}" /> </div>
                    <div class="mr-4 flex-1 content-end">{{ $vendor->email}} </div>
                    <div class="mr-4 flex-1 content-end">{{ $vendor->address->street_address}} </div>
                </li>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</x-guest-layout>
