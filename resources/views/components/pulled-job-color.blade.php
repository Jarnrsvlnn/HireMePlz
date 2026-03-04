@props([
    'tier' => 'Common'
])

@php
    $class = match($tier) {
        'Common' => 'bg-green-500 ',
        'Uncommon' => 'bg-blue-500',
        'Kinda mid' => 'bg-pink-500',
        'Epic' => 'bg-purple-700',
        'Legendary' => 'bg-yellow-500',
        'Godlike' => 'bg-red-500',
        default => 'bg-gray-500'
    };
@endphp

<div class="{{ $class }} border-black rounded-xl font-bold text-[clamp(1.2rem,5vw,2rem)] p-4 text-black text-center uppercase">
    {{ $slot }}
</div>
