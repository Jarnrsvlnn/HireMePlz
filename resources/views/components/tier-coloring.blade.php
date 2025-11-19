@props([
    'type' => 'p',
    'tier' => 'Common'
]);



@if ($tier == 'Common')
    <{{ $type == 'p' ? 'p' : ($type == 'option' ? 'option' : 'h1') }} class="text-sm text-green-500 uppercase"><strong>{{ $slot }}</strong></p>
@elseif ($tier =='Uncommon')
    <{{ $type == 'p' ? 'p' : ($type == 'option' ? 'option' : 'h1') }} class="text-sm text-blue-500 uppercase"><strong>{{ $slot }}</strong></p>
@elseif ($tier =='Epic')
    <{{ $type == 'p' ? 'p' : ($type == 'option' ? 'option' : 'h1') }} class="text-sm text-purple-700 uppercase"><strong>{{ $slot }}</strong></p>
@elseif ($tier =='Legendary')
    <{{ $type == 'p' ? 'p' : ($type == 'option' ? 'option' : 'h1') }} class="text-sm text-yellow-500 uppercase"><strong>{{ $slot }}</strong></p>    
@elseif ($tier =='Godlike')
    <{{ $type == 'p' ? 'p' : ($type == 'option' ? 'option' : 'h1') }} class="text-sm text-red-500 uppercase"><strong>{{ $slot }}</strong></p>
@endif