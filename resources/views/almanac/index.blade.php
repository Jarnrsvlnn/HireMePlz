<x-layout>
    <x-slot:title>
        Almanac
    </x-slot:title>
    <div class="flex flex-row mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <x-slot:header>
            Almanac
        </x-slot:header>
        <section class="border flex-1 items-start grid gap-x-10 gap-y-15 grid-cols-2 lg:gap-x-25 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 xl:grid-rows-3"> 
            <x-almanac.almanac-sections href="/almanac/technology">Technology</x-almanac.almanac-sections>
            <x-almanac.almanac-sections href="/almanac/medicine">Medicine</x-almanac.almanac-sections>
            <x-almanac.almanac-sections href="/almanac/engineering">Engineering</x-almanac.almanac-sections>
            <x-almanac.almanac-sections href="/almanac/biology">Biology</x-almanac.almanac-sections>
        </section>
    </div>
</x-layout>