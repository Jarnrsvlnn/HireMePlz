@props(['category'])

<a href="{{ route('almanac.index', ['category' => $category]) }}" class="border h-60 lg:h-100 cursor-pointer bg-amber-900">
    {{ $slot }}    
</a> 