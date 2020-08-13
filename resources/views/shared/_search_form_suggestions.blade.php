<form action="/search" class="flex flex-wrap -mx-3" method="GET">
    <div class="w-full sm:w-5/6 mb-2 sm:mb-0">
        <div class="px-3">
            <input type="text" class="w-full p-3 rounded outline-none text-gray-900"
                   placeholder="Search for products..." name="q">
        </div>
    </div>
    <div class="w-full sm:w-1/6">
        <div class="px-3">
            <button type="submit" class="bg-purple-600 w-full hover:bg-purple-700 focus:outline-none px-4 py-3 font-bold rounded">
                Search
            </button>
        </div>
    </div>
</form>
<div class="mt-2 ml-1 text-sm block">
    Popular:
    <a class="underline" href="/search?q=blotto+rta">Blotto RTA</a>,
    <a class="underline" href="/search?q=aegis+legend">Aegis Legend</a>,
    <a class="underline" href="/search?q=deathwish">Deathwish</a>,
    <a class="underline" href="/search?q=kylin">Kylin</a>,
    <a class="underline" href="/search?q=caliburn">Caliburn</a>
</div>
