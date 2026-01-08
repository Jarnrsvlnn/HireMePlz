<x-layout>
    <x-slot:title>
        Almanac
    </x-slot:title>
    <div class="flex flex-row mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <x-slot:header>
            Almanac
        </x-slot:header>
        <section class="border flex-1 items-start grid gap-x-10 gap-y-15 grid-cols-2 lg:gap-x-25 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 xl:grid-rows-3"> 
            <div class="border h-60 lg:h-100"></div>    
            <div class="border h-60 lg:h-100"></div>
            <div class="border h-60 lg:h-100"></div>
            <div class="border h-60 lg:h-100"></div>
        </section>
    </div>
</x-layout>