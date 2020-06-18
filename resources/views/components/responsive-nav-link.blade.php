@props(['url', 'active' => false])

<li>
    <a class="block {{ $active ? 'bg-gray-800 px-2 py-2 rounded -mx-2' : '' }}" href="{{ $url }}" {{ $attributes }}>{{ $slot }}</a>
</li>
