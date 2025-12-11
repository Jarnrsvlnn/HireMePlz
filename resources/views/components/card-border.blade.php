@props([
    'tier' => 'common'
])

@if ($tier == 'Common')
    <div class="flex border-3 border-green-500 w-full h-60 overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">{{ $slot }}</div>
@elseif ($tier =='Uncommon')
    <div class="flex border-3 border-blue-500 w-full h-60 overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">{{ $slot }}</div>
@elseif ($tier =='Kinda mid')
    <div class="flex border-3 border-pink-500 w-full h-60 overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">{{ $slot }}</div>
@elseif ($tier =='Epic')
    <div class="flex border-3 border-purple-500 w-full h-60 overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">{{ $slot }}</div>
@elseif ($tier =='Legendary')
    <div class="flex border-3 border-yellow-500 w-full h-60 overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">{{ $slot }}</div>
@elseif ($tier =='Godlike')
    <div class="flex border-3 border-red-500 w-full h-60 overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">{{ $slot }}</div>  
@endif