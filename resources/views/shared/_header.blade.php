<nav>
    <div class="max-w-screen-xl mx-auto px-6 xl:px-0">
        <div class="flex items-center justify-center sm:justify-between">
            <div class="flex flex-col sm:flex-row items-center">
                <div class="sm:mr-12 mb-3 sm:mb-0">
                    <a href="/">
                        @include('shared._logo_svg')
                    </a>
                </div>
                <div>
                    <ul class="flex font-bold space-x-6">
                        <li><a class="hover:underline" href="/search">Search</a></li>
                        <li><a class="hover:underline" href="/contact">Contact us</a></li>
                        <li><a class="hover:underline" href="/faq">FAQ</a></li>
                        <li><a class="hover:underline" href="/vendors">Vendors</a></li>
                    </ul>
                </div>
            </div>
            <div class="hidden sm:block">
                <a class="bg-purple-600 w-full flex items-center hover:bg-purple-700 px-4 py-3 font-bold rounded" href="https://www.buymeacoffee.com/vapecrawl" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1"  stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z"/>
                        <path d="M5 6h10a1 1 0 0 1 1 1v8a4 4 0 0 1 -4 4h-4a4 4 0 0 1 -4 -4v-8a1 1 0 0 1 1 -1" />
                        <path d="M16 9h2a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-2" />
                    </svg>
                    Buy me a coffee
                </a>
            </div>
        </div>
    </div>
</nav>
