<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vendors') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent my-2 overflow-hidden">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        New Vendor
                    </button>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @foreach ($vendors as $vendor)
                <div class="m-4">
                <li class="flex-row flex flex-grow style="list-style-type:none;">
                    <div class="mr-4 flex-1"><a href="/vendor/{!! $vendor->slug !!}"> {{$vendor->name}} </a></div>
                    <div class="mr-4 flex-1"><img style="max-height:50px; max-width:50px;width:100%;" src="{{$vendor->image->url}}" /> </div>
                    <div class="mr-4 flex-1">{{ $vendor->email}} </div>
                    <div class="mr-4 flex-1">{{ $vendor->phone}} </div>
                    <div class="mr-4 flex-1">{{ $vendor->address->street_address}} </div>
                    <div class="mr-4 flex-1">
                        <button
                        x-on:click.prevent="window.confirm('Does you want to sure this vendor so hard forever?')"
                            id="{{ $vendor->id }}"
                            type="button"
                            class="delete-vendor inline-flex justify-center py-1 px-1 border border-transparent
                            shadow-sm text-sm font-medium rounded-md text-white bg-red-600
                            hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                            >
                            Delete
                        </button>
                    </div>
                </li>
                </div>

                @endforeach
            </div>
        </div>
    </div>
    <script>

        document.addEventListener('click', function (event) {
            // If the clicked element doesn't have the right selector, bail
            if (!event.target.matches('.delete-vendor')) {
                // Don't follow the link
                event.preventDefault();
            } else {
                const vendor = document.getElementById(event.target.id)
                confirm('Are you want to forever this Vendor? id: ' + vendor.id )
            }
        });
</script>
</x-app-layout>
