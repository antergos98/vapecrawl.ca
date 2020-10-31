@section('page_title', 'Vendors -')

<x-layout>
    <h1 class="page-title">Vendors &amp; Coupons</h1>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($vendors as $vendor)
            <div class="border border-white rounded p-4">
                <span class="block text-2xl font-semibold mb-3">
                    <a href="{{ $vendor->url }}" class="transition duration-200 ease-in-out hover:text-indigo-500" target="_blank" rel="noopener">
                        {{ $vendor->name }}
                    </a>
                </span>
                <ul class="list-disc ml-4 space-y-2">
                    @forelse($vendor->activeCoupons as $coupon)
                        <li class="uppercase">
                            {{ $coupon->description }}
                        </li>
                    @empty
                        <li>No coupons for this vendor yet</li>
                    @endforelse
                </ul>
            </div>
        @endforeach
    </div>
</x-layout>
