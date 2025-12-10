@props([
    'type' => 'p',
    'tier' => 'Common'
]);



@if ($tier == 'Common')
    <{{ $type == 'p' ? 'p' : ($type == 'option' ? 'option' : 'h1') }} class="text-lg text-green-500 uppercase"><strong>{{ $slot }}</strong></p>
@elseif ($tier =='Uncommon')
    <{{ $type == 'p' ? 'p' : ($type == 'option' ? 'option' : 'h1') }} class="text-lg text-blue-500 uppercase"><strong>{{ $slot }}</strong></p>
@elseif ($tier =='Kinda mid')
    <{{ $type == 'p' ? 'p' : ($type == 'option' ? 'option' : 'h1') }} class="text-lg text-pink-500 uppercase"><strong>{{ $slot }}</strong></p>
@elseif ($tier =='Epic')
    <{{ $type == 'p' ? 'p' : ($type == 'option' ? 'option' : 'h1') }} class="text-lg text-purple-700 uppercase"><strong>{{ $slot }}</strong></p>
@elseif ($tier =='Legendary')
    <{{ $type == 'p' ? 'p' : ($type == 'option' ? 'option' : 'h1') }} class="text-lg text-yellow-500 uppercase"><strong>{{ $slot }}</strong></p>    
@elseif ($tier =='Godlike')
    <{{ $type == 'p' ? 'p' : ($type == 'option' ? 'option' : 'h1') }} class="text-lg text-red-500 uppercase"><strong>{{ $slot }}</strong></p>
@endif