<x-layout>
    <x-slot:title>
        Almanac
    </x-slot:title>
    <div class="flex flex-row mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <x-slot:header>
            Almanac
        </x-slot:header>
        {{-- JOBS SECTION --}}
        <section class="flex-1 items-start grid gap-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:grid-rows-4"> 
            {{-- JOB CARDS --}}
            @if ($jobs->isNotEmpty())
                @foreach ($jobs as $job)
                        
                <x-card-border :tier="$job->job_tier">
                    <div class="bg-white flex-1 bg-cover" style="background-image: url('https://images.unsplash.com/photo-1494726161322-5360d4d0eeae?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80')"></div>
                        <div class="flex w-2/3 p-4 md:p-4 flex-col justify-between">

                            <div class="flex-1">
                                {{-- TITLE --}}
                                <h1 class="mb-4 text-2xl font-bold text-gray-800 dark:text-white">{{ $job['job_title'] ?? 'Unknown Job' }}</h1>

                                {{-- DESCRIPTION --}}
                                <p class="mt-1 max-h-full overflow-auto wrap-break-word text-base md:text-sm text-left text-gray-600 dark:text-gray-400">{{ $job['description'] ?? 'No description' }}</p>
                            </div>

                            <div class="flex flex-1 flex-col justify-end">
                                {{-- TIER --}}
                                <div class="flex item-center mb-5">
                                    <x-tier-coloring type="h1" :tier="$job['job_tier']">
                                        Tier: {{ $job['job_tier'] ?? 'Unknown Tier' }}
                                    </x-tier-coloring>
                                </div>
                        
                                <div class="flex justify-between item-center">
                                    {{-- SALARY --}}
                                    <h1 class="text-2xl lg:text-base font-bold text-gray-700 dark:text-gray-200 md:text-xl">{{ $job['salary'] ?? 'Unknown Salary'}}</h1>

                                    {{-- BUTTONS --}}

                                    @auth
                                        <div class="flex flex-row justify-between gap-3 w-50 h-12 md:w-30 md:h-10">
                                            @can('delete', \App\Models\Job::class)
                                                <form class="w-full flex-1" action="{{ route('jobs.destroy', $job) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="flex items-center justify-center w-full h-full px-2 py-1 font-bold text-white uppercase transition-colors duration-300 transform  rounded  bg-red-500 hover:bg-red-400 dark:hover:bg-red-400 focus:outline-none focus:bg-gray-700 dark:focus:bg-red-400"><svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-7 md:h-6" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endcan

                                            <a href="{{ route('jobs.show', $job) }}" class="flex justify-center items-center h-full text-center flex-1 w-full text-md md:text-xs font-bold text-white uppercase transition-colors duration-300 transform bg-gray-800 rounded dark:bg-gray-700 hover:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-700 dark:focus:bg-gray-600">View</a>
                                        </div>
                                    @endauth

                                </div>
                            </div>

                        </div>
                    </x-card-border>
                @endforeach
            @else
                <h1>You are JOBLESS!</h1>
            @endif
            
        </section>
    </div>
</x-layout>