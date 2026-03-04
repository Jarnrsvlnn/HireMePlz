@props(['active' => false])

<a {{ $attributes }} class="{{ $active ? 'flex justify-center flex-1 md:flex-0 font-semibold items-center h-7 px-4 py-2 md:text-xs text-center bg-yellow-300 border-black border-3 rounded-4xl sm:text-base text-black whitespace-nowrap focus:outline-none' : 'flex flex-1 md:flex-0 justify-center font-semibold items-center h-12 px-4 py-2 md:text-xs text-center text-black bg-transparent sm:text-base whitespace-nowrap cursor-base hover:border-3 hover:h-7 hover:bg-black hover:border-yellow-300 hover:rounded-4xl hover:text-white md:text-white' }}">
    {{ $slot }}
</a>