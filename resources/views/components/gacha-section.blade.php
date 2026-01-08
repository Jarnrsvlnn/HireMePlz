<a {{ $attributes->merge(['class' => 'border border-white flex flex-1 justify-center items-center h-50 w-full rounded-2xl cursor-pointer']) }}>
    <h1 class="text-white text-4xl">{{ $slot }}</h1>
</a>