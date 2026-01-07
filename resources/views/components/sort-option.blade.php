@props(['sortMethod' => 'newest'])


<a href="{{ request()->fullUrlWithQuery(['sort' => $sortMethod]) }}" class="block px-4 py-2 hover:bg-gray-100">
    {{ $slot }}
</a>
