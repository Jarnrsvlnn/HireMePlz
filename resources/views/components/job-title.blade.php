@props([
    'tier'
])

@php
    $textColor = match($tier) {
        'Common' => 'text-green-300',
        'Uncommon' => 'text-blue-300',
        'Kinda mid' => 'text-pink-300',
        'Epic' => 'text-purple-400',
        'Legendary' => 'text-yellow-300',
        'Godlike' => 'text-red-300',
        default => 'text-gray-300'
    }
@endphp

<h1 class="w-full m-0.5 line-clamp-1 text-[clamp(1.3rem,1vw,1.4rem)] font-bold {{ $textColor }} [text-shadow:2px_0_0_black,-2px_0_0_black,0_2px_0_black,0_-2px_0_black]">{{ $slot }}</h1>