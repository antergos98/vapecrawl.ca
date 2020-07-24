<div>
    <div class="mb-3">
        <form wire:submit.prevent="searchProducts">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full sm:w-5/6 mb-3 sm:mb-0">
                    <div class="px-3">
                        <input type="text" class="w-full p-3 rounded outline-none text-gray-900"
                        placeholder="Search for products..." wire:model.lazy="q" autofocus>
                    </div>
                </div>
                <div class="w-full sm:w-1/6">
                    <div class="px-3">
                        <button type="submit" class="bg-gray-800 py-3 rounded w-full hover:bg-gray-700 focus:outline-none">Search</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @if($products->isEmpty())
        <div class="text-lg md:text-2xl text-center mt-6">
            <p>Sorry, there is no results based on your keywords and/or filters. 😨</p>
        </div>
    @endif

    <div class="flex flex-wrap -mx-3">
        @foreach($products as $product)
            <div class="w-full md:w-1/2 px-3 mb-6">
                <div class="bg-gray-800 p-6 rounded">
                    <div class="flex flex-col md:flex-row">
                        <div class="flex flex-shrink-0 mb-6 md:mb-0 md:mr-6">
                            <div class="object-cover mx-auto w-48 md:w-24 lg:w-32 h-full">
                                <a href="{{ $product->url }}" rel="noopener" target="_blank"
                                   title="{{ $product->name }}">
                                    <img class="block mx-auto h-48 md:h-24 lg:h-32 rounded" src="{{ $product->image }}" alt="{{ $product->name }}">
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between">
                            <div>
                                <div class="text-xl">
                                    <a href="{{ $product->url }}" rel="noopener" target="_blank"
                                       title="{{ $product->name }}" class="hover:underline">{{ $product->name }}</a>
                                </div>
                                <div class="text-gray-600 text-sm">Sold by <a rel="noopener"
                                                                              href="{{ $product->vendor->url }}"
                                                                              target="_blank" class="hover:underline"
                                                                              title="{{ $product->vendor->name }}">
                                    {{ $product->vendor->name }}</a></div>
                            </div>
                            <div class="flex">
                                <div class="text-lg mr-3">
                                    {{ number_format(($product->price / 100), 2) }} $
                                </div>
                                <div>
                                    @if ($product->in_stock)
                                        <span class="inline-block bg-green-200 text-green-700 rounded-full text-xs px-2">In Stock</span>
                                    @else
                                        <span class="inline-block bg-red-200 text-red-700 rounded-full text-xs px-2">Out of Stock</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
