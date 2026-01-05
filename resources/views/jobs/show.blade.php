<x-layout>
    <x-slot:title>
        Details {{ $job->job_title }}
    </x-slot:title>
    <div class="flex flex-col gap-5 justify-between mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <x-slot:header>
            Job Details / {{ $job->job_title ?? 'Unknown Job' }}    
        </x-slot:header>
        {{-- BUTTONS SECTION --}}

        <section id="job-details-btns-section" class="flex flex-row justify-between">
            <x-button id="back-button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                </svg>
                
                <span class="mx-1">Previous</span>
            </x-button>
            
            @can('update', \App\Models\Job::class)
                <x-button buttonType='button' id="open-dialog">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                    </svg>
                    <span class="mx-1">Edit</span>
                </x-button>
            @endcan

        </section>


        <section class="bg-white dark:bg-gray-900">
            <div class="container px-6 py-10 mx-auto">
                <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">{{ $job->job_title ?? 'Unknown Job' }}</h1>
        
                <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">

                    <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96" src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"alt="">
    
                    <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                        <x-tier-coloring type="p" :tier="$job['job_tier']">
                            Tier: {{ $job->job_tier ?? 'Unknown Tier'}}
                        </x-tier-coloring>
                        <h2 class="block mt-4 text-2xl font-semibold text-gray-800 dark:text-white">What does these <em>employed</em> beings even do?!</h2>
                        <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 md:text-sm">{{ $job->description ?? 'No Description' }}</p> 
        
                        <div class="flex items-center mt-6">
                            <div class="mx-4">
                                <h1 class="text-xl text-gray-700 dark:text-gray-200">Average Salary</h1>
                                <p class="text-1xl text-gray-200 dark:text-gray-200">{{ $job->salary ?? 'Unknown Salary'}}</p>
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
