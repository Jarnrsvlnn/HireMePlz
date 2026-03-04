<x-layout>
    <x-slot:title>
        Gacha
    </x-slot:title>
    <div class="flex flex-col m-auto w-full h-full py-2 sm:px-6 lg:px-50 transition-all duration-1100 opacity-100 translate-y-0 ease-in-out starting:opacity-30 starting:translate-y-20">
        <x-slot:header>
            TIme to get some JOB!
        </x-slot:header>

        {{-- BANNER UPPER SECTION  --}}
        <div class="flex flex-row justify-between rounded-2xl w-full shadow-2xl shrink-0 p-2 bg-white">
            {{-- BUTTON CONTAINERS --}}
            <div class="p-5">

            </div>
            {{-- CURRENCY CONTAINERS --}}
            <div class="p-2 flex flex-row gap-2">
                <div class="border-3 w-22 h-10 bg-yellow-300 rounded-4xl text-center py-1"></div>
                <div class="border-3 w-22 h-10 rounded-4xl bg-yellow-300 text-center py-1"></div>
            </div>
        </div>
        
        {{-- BANNER MIDDLE SECTION --}}
        <section class="flex shadow-2xl flex-1 overflow-auto flex-col lg:flex-row gap-2 pt-4 pb-2 px-1">

            {{-- LEFT/UPPER SECTION --}}
            <div class="flex flex-row min-h-0 min-w-0 lg:flex-col h-25 lg:flex-1 lg:h-full gap-1 sm:gap-3">
                <x-gacha-section style="background-image: url('/images/bannerone.jpg')" href="{{ request()->fullUrlWithQuery(['banner' => 'limited']) }}">Limited Banner</x-gacha-section>
                <x-gacha-section style="background-image: url('/images/bannertwo.jpg')" href="{{ request()->fullUrlWithQuery(['banner' => 'beginner']) }}">Beginner's Banner</x-gacha-section>
                <x-gacha-section style="background-image: url('/images/bannerthree.jpeg')" href="{{ request()->fullUrlWithQuery(['banner' => 'standard']) }}">Standard Banner</x-gacha-section>
            </div>
            
            {{-- RIGHT/BOTTOM SECTION --}}
            <x-banner.banner-page :banner="request()->query('banner')">
                {{-- BANNER TITLE SECTION --}}
                <div class="">
                    <x-banner.banner-title>{{ $banner['title'] }}</x-banner.banner-title>
                </div>
                {{-- BANNER DESC. SECTION --}}
                <div class="py-3 h-40 w-full">
                    <x-banner.banner-description>{{ $banner['description'] }}</x-banner.banner-description>
                </div>                
                {{-- PITY SECTION --}}
                <div class="mt-auto font-semibold text-[clamp(1.2rem,2vw,2rem)] text-right text-white">{{ $pity }} / {{ $maxPity }}</div>
            </x-banner.banner-page>
        </section>

        {{-- BANNER LOWER SECTION --}}
        <div class="w-full shrink-0 rounded-2xl p-2 bg-white">
            <div id="banner-buttons" class="flex-1 flex justify-between gap-1 p-2 md:justify-end md:gap-3">
                <x-banner.banner-draw-button href="{{ request()->fullUrlWithQuery(['multi' => 1]) }}">Draw 1x</x-banner.banner-draw-button>
                <x-banner.banner-draw-button href="{{ request()->fullUrlWithQuery(['multi' => 10]) }}">Draw 10x</x-banner.banner-draw-button>
            </div>
        </div>
    </div>
    
    {{-- GACHA PULLS RESULT --}}
    <x-modal-base 
        id="pulls-section"
        data-has-pulls="{{ !empty($pulls) ? 'true' : 'false'}}"
        class="bg-[rgb(50,50,50)] rounded-2xl w-full max-w-xl p-0 overflow-hidden">

        <div class="flex flex-col max-h-[85dvh]">
            {{-- HEADER --}}
            <div class="flex justify-between items-center px-6 py-4 border-b border-white/10">
                <h2 class="text-xl font-semibold text-white">
                    Gacha Results
                </h2>
                <x-button buttonType="button" id="close-pulls-section">✕</x-button>
            </div>

            {{-- CONTENT --}}
            <div class="flex-1 overflow-auto px-6 py-4 space-y-4">
                @if (!empty($pulls))
                    @foreach ($pulls as $pull)
                        <x-pulled-job-color :tier="$pull['job_tier']">
                            {{ $pull['job_title'] }}
                        </x-pulled-job-color>
                    @endforeach
                @else
                    <p class="text-center text-white/60">
                        No pulls yet.
                    </p>
                @endif
            </div>
        </div>
    </x-modal-base>

</x-layout>

