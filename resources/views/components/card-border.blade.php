@props([
    'tier' => 'common'
])

@if ($tier == 'Common')
    <div {{ $attributes->merge(['class' => 'border-12 border-green-700']) }}>{{ $slot }}</div>
@elseif ($tier =='Uncommon')
    <div {{ $attributes->merge(['class' => 'border-12 border-blue-700']) }}>{{ $slot }}</div>
@elseif ($tier =='Kinda mid')
    <div {{ $attributes->merge(['class' => 'border-12 border-pink-700']) }}>{{ $slot }}</div>
@elseif ($tier =='Epic')
    <div {{ $attributes->merge(['class' => 'border-12 border-purple-700']) }}>{{ $slot }}</div>
@elseif ($tier =='Legendary')
    <div {{ $attributes->merge(['class' => 'border-12 border-yellow-700']) }}>{{ $slot }}</div>
@elseif ($tier =='Godlike')
<div {{ $attributes->merge(['class' => 'border-12 border-red-800']) }}>{{ $slot }}</div>
@endif