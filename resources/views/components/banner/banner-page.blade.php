@props([
    'banner'    
])

@php
    $bgImage = match($banner) {
        'limited' => "/images/bannerone.jpg",
        'beginner' => "/images/bannertwo.jpg",
        'standard' => "/images/bannerthree.jpeg",
        default => "/images/bannerone.jpg",
    };
@endphp

<div style="background-image: url('{{ $bgImage }}')" {{ $attributes->merge(['class' => 'flex flex-col min-h-0 min-w-0 rounded-2xl flex-1 px-3 py-6 lg:flex-4 bg-cover bg-no-repeat bg-center']) }}>
    {{ $slot }}
</div>