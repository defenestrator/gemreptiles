<div class="grid grid-cols-12">
    <div class="sm:col-start-3 sm:col-span-8 col-span-12 col-start-0 p-2">
        <form wire:submit.prevent="submit" method="POST" enctype="multipart/form-data">
            <div class="shadow overflow-hidden w-100 sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div x-data="{logoName: null, logoPreview: null}" class="col-span-6 sm:col-span-4">
                            <!-- Profile logo File Input -->
                            <input type="file" class="hidden"
                                wire:model="logo"
                                x-ref="logo"
                                x-on:change="
                                    logoName = $refs.logo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        logoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.logo.files[0]);
                            " />

                            <x-jet-label for="logo" value="{{ __('logo') }}" />

                            <!-- Current Profile logo -->
                            <div class="mt-2" x-show="! logoPreview">
                                <img src="{{ $this->logo }}" alt="{{ $this->name }}"
                                    class="rounded-full h-20 w-20 object-cover">
                            </div>

                            <!-- New Profile logo Preview -->
                            <div class="mt-2" x-show="logoPreview">
                                <span class="block rounded-full w-20 h-20"
                                    x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + logoPreview + '\');'">
                                </span>
                            </div>

                            <x-jet-secondary-button class="mt-2 mr-2" type="button"
                                x-on:click.prevent="$refs.logo.click()">
                                {{ __('Select A New logo') }}
                            </x-jet-secondary-button>

                            @if ($this->logo)
                                <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilelogo">
                                    {{ __('Remove logo') }}
                                </x-jet-secondary-button>
                            @endif

                            <x-jet-input-error for="logo" class="mt-2" />
                        </div>
                        @error('logo') <span class="error">{{ $message }}</span> @enderror
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700 capitalize">Name</label>
                            <input type="text" wire:model="name" id="name"
                                autocomplete="name"
                                class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="email" class="block text-sm font-medium text-gray-700 capitalize">Email
                                address</label>
                            <input type="text" wire:model="email" id="email" autocomplete="email"
                                class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6">
                            <label for="website"
                                class="block text-sm font-medium text-gray-700 capitalize">Website</label>
                            <input type="text" wire:model="website" id="website" autocomplete="website"
                                class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                        </div>
                        <div class="col-span-6">
                            <label for="morphmarket"
                                class="block text-sm font-medium text-gray-700 capitalize">Morph Market</label>
                            <input type="text" wire:model="morph_market" id="morphmarket"
                                class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6">
                            <label for="facebook"
                                class="block text-sm font-medium text-gray-700 capitalize">facebook</label>
                            <input type="text" wire:model="facebook" id="facebook" autocomplete="facebook"
                                class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6">
                            <label for="instagram"
                                class="block text-sm font-medium text-gray-700 capitalize">instagram</label>
                            <input type="text" wire:model="instagram" id="instagram" autocomplete="instagram"
                                class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6">
                            <label for="youtube"
                                class="block text-sm font-medium text-gray-700 capitalize">YouTube</label>
                            <input type="text" wire:model="youtube" id="youtube" autocomplete="youtube"
                                class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6">
                            <label for="phone"
                                class="block text-sm font-medium text-gray-700 capitalize">phone</label>
                            <input type="tel" wire:model="phone" id="phone" autocomplete="phone"
                                class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6">
                            <label for="description"
                                class="block text-sm font-medium text-gray-700 capitalize">description</label>
                            <textarea type="textarea" wire:model="description" id="description" name="description"
                                class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>

                        </div>
                        <div class="col-span-6">
                            <label for="address" class="block text-sm font-medium text-gray-700 capitalize">Street
                                address</label>
                            <input type="text" wire:model="address" id="address" autocomplete="address"
                                class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6">
                            <label for="unit_number" class="block text-sm font-medium text-gray-700 capitalize">
                                Unit/Apartment/Suite
                            </label>
                            <input type="text" wire:model="unit_number" id="unit_number" autocomplete="unit_number"
                                class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <label for="city"
                                class="block text-sm font-medium text-gray-700 capitalize">City</label>
                            <input type="text" wire:model="city" id="city"
                                class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <label for="state" class="block text-sm font-medium text-gray-700 capitalize">State</label>
                            <input type="text" wire:model="state" id="state"
                                class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <label for="zip" class="block text-sm font-medium text-gray-700 capitalize">ZIP</label>
                            <input type="text" wire:model="zip" id="zip" autocomplete="zip"
                                class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
