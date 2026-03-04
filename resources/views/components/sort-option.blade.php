@props(['sortMethod' => 'newest'])


<a href="{{ request()->fullUrlWithQuery(['sort' => $sortMethod]) }}" class="block px-4 py-2 hover:bg-black hover:text-yellow-300">
    {{ $slot }}
</a>
