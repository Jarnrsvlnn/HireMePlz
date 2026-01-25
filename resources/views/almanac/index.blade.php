<x-layout>
    <x-slot:title>
        Almanac
    </x-slot:title>
    <div class="flex flex-row mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <x-slot:header>
            Almanac
        </x-slot:header>

        {{-- BUTTONS SECTION --}}
        <section id="job-details-btns-section" class="flex flex-row justify-between">
            <x-button id="back-button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                </svg>
                
                <span class="mx-1">Previous</span>
            </x-button>
        </section>

        @if (!$category)
            <section class="border flex-1 items-start grid gap-x-10 gap-y-15 grid-cols-2 lg:gap-x-25 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 xl:grid-rows-3"> 
                <x-almanac.almanac-sections category="Technology">Technology</x-almanac.almanac-sections>
                <x-almanac.almanac-sections category="Design & Creative">Design & Creative</x-almanac.almanac-sections>
                <x-almanac.almanac-sections category="Business Management">Business Management</x-almanac.almanac-sections>  
                <x-almanac.almanac-sections category="Sales & Marketing">Sales & Marketing</x-almanac.almanac-sections>
                <x-almanac.almanac-sections category="Finance & Accounting">Finance & Accounting</x-almanac.almanac-sections>
                <x-almanac.almanac-sections category="Customer Service">Customer Service</x-almanac.almanac-sections>
                <x-almanac.almanac-sections category="Healthcare">Healthcare</x-almanac.almanac-sections>
                <x-almanac.almanac-sections category="Education">Education</x-almanac.almanac-sections>
                <x-almanac.almanac-sections category="Engineering">Engineering</x-almanac.almanac-sections>
                <x-almanac.almanac-sections category="Construction & Trades">Construction & Trades</x-almanac.almanac-sections>
                <x-almanac.almanac-sections category="Legal">Legal</x-almanac.almanac-sections>
                <x-almanac.almanac-sections category="Media & Communication">Media & Communication</x-almanac.almanac-sections>
                <x-almanac.almanac-sections category="Hospitality & Tourism">Hospitality & Tourism</x-almanac.almanac-sections>
                <x-almanac.almanac-sections category="Logistics & Transportation">Logistics & Transportation</x-almanac.almanac-sections>
                <x-almanac.almanac-sections category="Retail & E-commerce">Retail & E-commerce</x-almanac.almanac-sections>
                <x-almanac.almanac-sections category="Government & Public Service">Government & Public Service</x-almanac.almanac-sections>
                <x-almanac.almanac-sections category="Science & Research">Science & Research</x-almanac.almanac-sections>
                <x-almanac.almanac-sections category="Agriculture">Agriculture</x-almanac.almanac-sections>
                <x-almanac.almanac-sections category="Maintenance & Services">Maintenance & Services</x-almanac.almanac-sections>
                <x-almanac.almanac-sections category="Arts & Entertainment">Arts & Entertainment</x-almanac.almanac-sections>
            </section>
        @else
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
                        
                    </div>

                </div>
        
                {{-- JOBS SECTION --}}
                <section class="flex-1 items-start grid gap-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:grid-rows-4"> 
                    {{-- JOB CARDS --}}
                    @if ($jobs && $jobs->isNotEmpty())
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

                                                    @if(auth()->user()->isAdmin())
                                                        <x-view-button href="{{ route('jobs.show', $job) }}">View</x-view-button>
                                                    @endif
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
                @if ($jobs && $jobs->hasPages())
                    <x-pagination-button :jobs="$jobs"></x-pagination-button>
                @endif

            </div>
        @endif

    </div>
</x-layout>