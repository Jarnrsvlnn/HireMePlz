<x-layout>
    <x-slot:title>
        Gacha
    </x-slot:title>
    <div class="flex flex-row mx-auto gap-10 max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <x-slot:header>
            TIme to get some JOB!
        </x-slot:header>
        
        <div class="flex flex-col gap-20 w-80 h-180">
            <x-gacha-section href="{{ request()->fullUrlWithQuery(['banner' => 'limited']) }}">Limited Banner</x-gacha-section>
            <x-gacha-section href="{{ request()->fullUrlWithQuery(['banner' => 'beginner']) }}">Beginner's Banner</x-gacha-section>
            <x-gacha-section href="{{ request()->fullUrlWithQuery(['banner' => 'standard']) }}">Standard Banner</x-gacha-section>
        </div>
        
        <section class="flex flex-1 flex-col gap-2 border border-white rounded-2xl p-5">
            {{-- BANNER TITLE SECTION --}}
            <div class="border flex-1">
                <x-banner.banner-title>{{ $banner['title'] }}</x-banner.banner-title>
            </div>

            {{-- JOB TITLE SECTION --}}
            <div class="border flex-1">
                <x-banner.job-title>Software Engineer</x-banner.job-title>
            </div>

            {{-- BANNER DESC. SECTION --}}
            <div class="border flex-3">
                <x-banner.banner-description>{{ $banner['description'] }}</x-banner.banner-description>
            </div>

            {{-- BANNER LOWER SECTION --}}
            <div class="border flex-1">
                <x-banner.banner-draw-button>Draw 10X</x-banner.banner-draw-button>
            </div>
        </section>
    </div>
</x-layout>
