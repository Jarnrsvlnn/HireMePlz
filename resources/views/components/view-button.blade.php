<a {{ $attributes->merge(['class' => 'flex justify-center items-center h-full text-center flex-1 w-full text-md md:text-xs font-bold text-white uppercase transition-colors duration-300 transform bg-gray-800 rounded dark:bg-gray-700 hover:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-700 dark:focus:bg-gray-600']) }}>
    {{ $slot }}
</a>
