@props(['active' => false])

<a {{ $attributes }} class="{{ $active ? 'inline-flex items-center h-7 px-4 py-2 text-xs text-center bg-black border-[rgb(80,80,80)] border-3 rounded-4xl sm:text-base dark:text-white whitespace-nowrap focus:outline-none' : 'inline-flex items-center h-12 px-4 py-2 text-xs text-center text-gray-700 bg-transparent sm:text-base dark:border-gray-500 dark:text-white whitespace-nowrap cursor-base hover:border-3 hover:h-7 hover:bg-black hover:border-[rgb(80,80,80)] hover:rounded-4xl hover:text-white' }}">
    {{ $slot }}
</a>