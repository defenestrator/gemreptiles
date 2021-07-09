<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-semibold">New Vendor</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                @livewire('vendor.create-vendor')
            </div>
        </div>
    </div>
</x-app-layout>
