@props([
    'type' => 'p',
    'tier' => 'Common'
])

@php
$tag = $type == 'p' ? 'p' : ($type == 'option' ? 'option' : 'h1');
$class = match($tier) {
    'Common' => 'text-green-500',
    'Uncommon' => 'text-blue-500',
    'Kinda mid' => 'text-pink-500',
    'Epic' => 'text-purple-700',
    'Legendary' => 'text-yellow-500',
    'Godlike' => 'text-red-500',
    default => 'text-gray-500'
};
@endphp

<{{ $tag }} class="text-lg md:text-sm {{ $class }} uppercase"><strong>{{ $slot }}</strong></{{ $tag }}>
