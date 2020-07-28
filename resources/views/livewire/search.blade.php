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
                        <button type="submit"
                                class="bg-gray-800 py-3 rounded w-full hover:bg-gray-700 focus:outline-none">Search
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="grid grid-cols-3 gap-3 text-gray-900 mb-3">
        <div>
            <select id="js-sort-by">
                <option value="relevant">Most relevant</option>
                <option value="asc">Price (low to high)</option>
                <option value="desc">Price (high to low)</option>
            </select>
        </div>
        <div>
            <select id="js-filter-availability">
                <option value="1">In Stock</option>
                <option value="0">Out of Stock</option>
            </select>
        </div>
        <div>
            <select id="js-filter-vendors">
                @foreach($products->pluck('vendor.id') as $vendor)
                    <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @unless(count($products))
        <div class="text-lg md:text-2xl text-center mt-6">
            <p>Sorry, there is no results based on your keywords and/or filters. 😨</p>
        </div>
    @endunless

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($products as $product)
            <x-product-card :product="$product"></x-product-card>
        @endforeach
    </div>

    <div wire:loading wire:target="searchProducts">
        <x-loading-overlay></x-loading-overlay>
    </div>
</div>

@push('scripts')
    <script>
        new Choices('#js-sort-by', {
            searchEnabled: false
        });
        new Choices('#js-filter-availability', {
            searchEnabled: false
        });
        new Choices('#js-filter-vendors');
    </script>
@endpush
