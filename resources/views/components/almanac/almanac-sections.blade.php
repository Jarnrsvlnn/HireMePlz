@props(['category'])

<a href="{{ route('almanac.index', ['category' => $category]) }}" {{ $attributes->merge(['class' => 'flex items-center justify-center border-7 border-black -skew-x-5 h-60 lg:h-100 cursor-pointer bg-yellow-300']) }}>
    {{ $slot }}    
</a> 