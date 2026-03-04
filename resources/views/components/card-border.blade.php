@props([
    'tier' => 'common'
])

@if ($tier == 'Common')
    <div {{ $attributes->merge(['class' => 'bg-linear-to-br from-green-700 via-green-400 to-green-600']) }}>{{ $slot }}</div>
@elseif ($tier =='Uncommon')
    <div {{ $attributes->merge(['class' => 'bg-linear-to-br from-blue-700 via-blue-400 to-blue-600']) }}>{{ $slot }}</div>
@elseif ($tier =='Kinda mid')
    <div {{ $attributes->merge(['class' => 'bg-linear-to-br from-pink-700 via-pink-400 to-pink-600']) }}>{{ $slot }}</div>
@elseif ($tier =='Epic')
    <div {{ $attributes->merge(['class' => 'bg-linear-to-br from-purple-700 via-purple-400 to-purple-600']) }}>{{ $slot }}</div>
@elseif ($tier =='Legendary')
    <div {{ $attributes->merge(['class' => 'bg-linear-to-br from-yellow-700 via-yellow-400 to-yellow-600']) }}>{{ $slot }}</div>
@elseif ($tier =='Godlike')
<div {{ $attributes->merge(['class' => 'bg-linear-to-br from-red-700 via-red-400 to-red-600']) }}>{{ $slot }}</div>
@endif