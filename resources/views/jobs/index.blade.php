<x-layout>
    <x-slot:title>
        Jobs
    </x-slot:title>
    <x-slot:header>
        Jobs / All
    </x-slot:header>

    <div class="flex min-h-screen mx-auto max-w-7xl">
        <div class="flex flex-1 flex-col gap-15 mx-auto px-4 py-6 sm:px-6 lg:px-9">
        
            <div class="flex justify-between">

                <h1 class="text-3xl font-bold tracking-tight text-white">Sorted By: {{ \App\Services\StringFormatter::title(request('sort') ?? 'Newest') }}</h1>

                {{-- BUTTON CONTAINER --}}
                <div class="flex flex-row justify-end gap-5">
                    {{-- SORT BUTTON --}}
                    <div class="relative inline-block">
                        <x-button id="sort-button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                            </svg>     
                            
                            <span class="mx-1">Sort</span>    
                        </x-button>

                        <div id="sort-options" class="hidden absolute cursor-pointer rounded-lg bg-blue-200">
                            <x-sort-option sortMethod="newest">Newest</x-sort-option>
                            <x-sort-option sortMethod="oldest">Oldest</x-sort-option>
                            <x-sort-option sortMethod="tier">Tier</x-sort-option>
                        </div>
                    </div>
                    
                    {{-- CREATE BUTTON (ADMIN ONLY FEATURE) --}}
                    @can('create', \App\Models\Job::class)
                        <x-button id='open-dialog'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <span class="mx-1">Create</span>
                        </x-button>
                    @endcan
                </div>

            </div>
    
            {{-- JOBS SECTION --}}
            <section class="flex-1 items-start grid gap-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:grid-rows-4"> 
                {{-- JOB CARDS --}}
                @if ($jobs->isNotEmpty())
                    @foreach ($jobs as $job)
                            
                    <x-card-border :tier="$job->job_tier">
                        <div class="flex-1 bg-cover" style="background-image: url('https://images.unsplash.com/photo-1494726161322-5360d4d0eeae?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80')"></div>
                            <div class="flex w-2/3 p-4 md:p-4 flex-col justify-between">
    
                                <div class="flex-1">
                                    {{-- TITLE --}}
                                    <x-job-title>{{ $job['job_title'] ?? 'Unknown Job' }}</x-job-title>
    
                                    {{-- DESCRIPTION --}}
                                    <x-job-description>{{ $job['description'] ?? 'No description' }}</x-job-description>
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
                                        <x-job-salary>{{ $job['salary'] ?? 'Unknown Salary'}}</x-job-salary>
    
                                        {{-- BUTTONS --}}
                                        @auth
                                            <div class="flex flex-row justify-between gap-3 w-50 h-12 md:w-30 md:h-10">
                                                @can('delete', \App\Models\Job::class)
                                                    <form class="w-full flex-1" action="{{ route('jobs.destroy', $job) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-delete-button></x-delete-button>
                                                    </form>
                                                @endcan

                                                <x-view-button href="{{ route('jobs.show', $job) }}">View</x-view-button>
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
    
            {{-- PAGINATION --}}
            @if ($jobs->hasPages())
                <x-pagination-button :jobs="$jobs"></x-pagination-button>
            @endif

        </div>

    </div>

    {{-- SUCCESS ALERT --}}
    <section class="flex justify-center items-center mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="flex w-full fixed max-w-sm overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="flex items-center justify-center w-12 bg-emerald-500">
                    <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                    </svg>
                </div>
                
                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        <span class="font-semibold text-emerald-500 dark:text-emerald-400">Success</span>
                        <p class="text-sm text-gray-600 dark:text-gray-200">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif
    </section>

    
    {{-- CREATE FORM --}}
    @can('create', \App\Models\Job::class)
        <x-dialog-modal :errors="$errors" formType='create'></x-dialog-modal>   
    @endcan

</x-layout> 