@props(['url', 'active' => false])

<li>
    <a class="hover:bg-indigo-600 py-2 px-4 rounded {{ $active ? 'bg-indigo-600' : '' }}" href="{{ $url }}" {{ $attributes }}>
        {{ $slot }}
    </a>
</li>
