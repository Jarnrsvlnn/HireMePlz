<x-layout>
    <x-slot:title>
        Details {{ $job->job_title }}
    </x-slot:title>
    <div class="flex flex-col gap-5 justify-between mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <x-slot:header>
            Job Details / {{ $job->job_title ?? 'Unknown Job' }}    
        </x-slot:header>

        {{-- BUTTONS SECTION --}}
        <div id="job-details-btns-section" class="relative left-1/2 top-2 -translate-x-1/2 flex justify-center h-15 sm:h-14 bg-black w-screen z-50">

            <div class="sticky p-2 h-full top-5 gap-4 z-50 flex flex-row w-[85vw] md:w-[60vw] rounded-lg flex-nowrap items-center justify-between bg-yellow-300 border-3 -skew-x-20 transition-all duration-1000 ease-out translate-x-0 starting:-translate-x-100">

                <x-button class="flex-1 sm:flex-0" id="back-button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                    </svg>
                    
                    <span class="mx-1">Previous</span>
                </x-button>
                
                @can('update', \App\Models\Job::class)
                    <x-button class="flex-1 sm:flex-0" buttonType='button' id="open-dialog">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>
                        <span class="mx-1">Edit</span>
                    </x-button>
                @endcan

            </div>
        </div>

        <section class="border-7 min-w-[300px] bg-yellow-300 rounded-2xl transition-all delay-200 opacity-100 duration-1200 ease-in-out translate-y-0 starting:opacity-0 starting:translate-y-50">
            <div class="container px-6 py-10 mx-auto">
                <h1 class="text-[clamp(1rem,5vw,2rem)] bold-text text-black capitalize  -skew-x-10">{{ $job->job_title ?? 'Unknown Job' }}</h1>
        
                <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">

                    <div class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96 bg-white"></div>
    
                    <div class="mt-6 lg:w-1/2 lg:mt-0">
                        <x-tier-coloring type="p" :tier="$job['job_tier']">
                            Tier: {{ $job->job_tier ?? 'Unknown Tier'}}
                        </x-tier-coloring>
                        <h2 class="block mt-4 text-2xl font-semibold text-black">What does these <em>employed</em> beings even do?!</h2>
                        <p class="mt-3 text-[clamp(1rem,1vw,1.2rem)] text-black md:text-sm line-clamp-5 md:line-clamp-0">{{ $job->description ?? 'No Description' }}</p> 
        
                        <div class="flex items-center mt-6">
                            <div class="mx-4">
                                <h1 class="text-xl text-black">Average Salary</h1>
                                <p class="text-1xl text-black">{{ $job->salary ?? 'Unknown Salary'}}</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>

    </div>

    {{-- UPDATE FORM --}}
    <x-dialog-modal formType='update' :job='$job'></x-dialog-modal>
</x-layout>
