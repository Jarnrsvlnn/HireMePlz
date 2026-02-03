@props(['active' => false])

<a {{ $attributes }} class="{{ $active ? 'inline-flex items-center h-12 px-4 py-2 text-sm text-center sm:text-base dark:text-white whitespace-nowrap focus:outline-none' : 'inline-flex items-center h-12 px-4 py-2 text-sm text-center text-gray-700 bg-transparent sm:text-base dark:border-gray-500 dark:text-white whitespace-nowrap cursor-base hover:bg-white hover:rounded-3xl hover:text-black' }}">
    {{ $slot }}
</a>