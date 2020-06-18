<div
    x-init="
        window.addEventListener('scroll', function() {
            show = document.body.scrollTop > 700 || document.documentElement.scrollTop > 700;
        });
    "
    x-data="{ show: false }"
    x-on:click="window.scrollTo(0, 0)"
    x-transition:enter="transition ease-out duration-100 transform"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-75 transform"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    x-show="show"
    class="transition duration-200 ease-in-out fixed z-40 p-3 bg-indigo-600 hover:bg-indigo-700 rounded-full shadow-lg cursor-pointer"
    style="bottom: 20px; right: 20px; display: none;">
    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd"
              d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
              clip-rule="evenodd"></path>
    </svg>
</div>
