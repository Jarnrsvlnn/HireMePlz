@props([
    'buttonType' => 'a'
])

@if ($buttonType == 'a')
    <a {{ $attributes->merge(['class' => 'flex items-center sticky cursor-pointer top-10 px-4 py-2 h-10 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80']) }}>{{ $slot }}</a>
@else
    <button {{ $attributes->merge(['class' => 'flex items-center sticky cursor-pointer top-10 px-4 py-2 h-10 font-medicursor-pointerum tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80']) }}>{{ $slot }}</button>
@endif  