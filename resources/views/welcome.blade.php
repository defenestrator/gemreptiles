<x-guest-layout>
    <div class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        @if (Route::has('login'))
            <div class="absolute top-0 right-0 px-8 py-6 block">
                @auth
                    <a role="button" href="{{ url('/dashboard') }}"
                        class="ml-4 inline-flex items-center px-4 py-2 text-green-600 rounded-md font-semibold text-xs uppercase tracking-widest hover:text-green-400 active:green-500 focus:outline-none focus:border-green-700 focus:ring focus:ring-green-300 disabled:opacity-25 transition">
                        Dashboard
                    </a>
                @else
                    <a role="button" href="{{ route('login') }}"
                        class="ml-4 inline-flex items-center px-4 py-2 text-green-600 rounded-md font-semibold text-xs uppercase tracking-widest hover:text-green-400 active:green-500 focus:outline-none focus:border-green-700 focus:ring focus:ring-green-300 disabled:opacity-25 transition">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a role="button" href="{{ route('register') }}"
                            class="ml-4 inline-flex items-center px-4 py-2 text-green-600 rounded-md font-semibold text-xs uppercase tracking-widest hover:text-green-400 active:green-500 focus:outline-none focus:border-green-700 focus:ring focus:ring-green-300 disabled:opacity-25 transition">
                            Register
                        </a>
                    @endif
                @endauth           </div>
        @endif

        <div class="max-w-6xl mx-auto py-4 sm:px-6 lg:px-8 mt-8">
            <div class="container text-center mt-4">
                <img class="mx-auto text-center object-contain w-100" src="favicon.png"
                    style="padding-bottom:0; height:100px; width:100px;npm run" alt="Hatched in Idaho, 2004">
            </div>
            <div class="container text-center">
                <h1 class="text-center px-2 pb-0 mb-0"
                    style="font-size:2.0rem; margin:0 auto; padding-bottom:0; margin-top:-1rem;">
                    {{ config('app.name'), 'Gem Reptiles' }}
                </h1>
            </div>
            <div class="container text-right px-2">
                <h2 class="text-yellow-600 sans"
                    style=" margin-top:0; line-height:1; text-align:right; font-size:1.0rem; font-weight:400; margin-right:0.44667rem;">
                    We're the wild-type
                </h2>
            </div>
        </div>
    </div>
    @livewire('search-species')
    </div>
</x-guest-layout>
