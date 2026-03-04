@props([
    'buttonType' => 'a'
])

@if ($buttonType == 'a')
    <a {{ $attributes->merge(['class' => 'flex items-center justify-center sticky cursor-pointer top-10 px-4 py-2 h-10 font-medium tracking-wide text-white capitalize bg-black hover:bg-yellow-300 hover:border-5 hover:rounded-none hover:border-black hover:text-black -skew-x-10']) }}>{{ $slot }}</a>
@else
    <button {{ $attributes->merge(['class' => 'flex items-center justify-center sticky cursor-pointer top-10 px-4 py-2 h-10 font-medicursor-pointerum text-white bg-black hover:bg-yellow-300 hover:border-5 hover:rounded-none hover:border-black hover:text-black -skew-x-10']) }}>{{ $slot }}</button>
@endif  