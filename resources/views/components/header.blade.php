<nav x-data="{ show: false }">
    <div class="max-w-screen-xl mx-auto px-6 xl:px-0">
        <div class="flex justify-between flex-row items-center">
            <div>
                <a href="/">
                    <x-svg-logo/>
                </a>
            </div>

            <div class="block md:hidden">
                <button x-on:click="show = !show"
                        class="flex items-center justify-center h-12 w-12 rounded-full ml-1 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <svg x-show="!show" class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-cloak x-show="show" class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="hidden md:block">
                <ul class="flex font-bold space-x-6">
                    <x-nav-link :url="route('home')" :active="request()->routeIs('home') || request()->routeIs('search')">Home</x-nav-link>
                    <x-nav-link :url="route('contact')" :active="request()->routeIs('contact')">Contact us</x-nav-link>
                    <x-nav-link url="https://paypal.me/vapecrawlca" target="_blank">Donate</x-nav-link>
                </ul>
            </div>
        </div>
        <div class="my-3 block md:hidden" x-cloak x-show="show">
            <ul class="flex flex-col font-bold space-y-4">
                <x-responsive-nav-link :url="route('home')" :active="request()->routeIs('home') || request()->routeIs('search')">
                    Home
                </x-responsive-nav-link>

                <x-responsive-nav-link :url="route('contact')" :active="request()->routeIs('contact')">
                    Contact
                </x-responsive-nav-link>

                <x-responsive-nav-link url="https://paypal.me/vapecrawlca" target="_blank">
                    Donate
                </x-responsive-nav-link>
            </ul>
        </div>
    </div>
</nav>
