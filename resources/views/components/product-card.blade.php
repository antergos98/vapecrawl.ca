<div class="bg-gray-800 p-6 rounded" {{ $attributes }}>
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
