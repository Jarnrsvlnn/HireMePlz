<a {{ $attributes->merge(['class' => 'flex justify-center items-center h-full text-center flex-1 w-full text-md md:text-xs font-bold text-white uppercase transition-colors duration-300 transform rounded bg-black transition-all duration-200 ease-out hover:bg-yellow-400 hover:text-black focus:outline-none focus:bg-yellow-700 -skew-x-10']) }}>
    {{ $slot }}
</a>
