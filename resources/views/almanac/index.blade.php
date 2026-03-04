<x-layout>
    <x-slot:title>
        Almanac
    </x-slot:title>

    <div class="flex justify-center items-center flex-col mt-2">

        <h1 class="bold-text text-[clamp(3rem,10vw,5rem)] tracking-tight italic text-yellow-300 [text-shadow:2px_2px_0_black,-2px_2px_0_black,2px_-2px_0_black,-2px_-2px_0_black]">CATEGORIES</h1>

        <div class="flex flex-row mx-auto w-full max-w-7xl mt-1 px-4 py-6 sm:px-6 lg:px-8 m-20
        ">
            <x-slot:header>
                Almanac
            </x-slot:header>
    
            @if (!$category)
                <section class="flex-1 items-start grid gap-x-10 gap-y-15 grid-cols-2 lg:gap-x-25 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 xl:grid-rows-3"> 
                    <x-almanac.almanac-sections class="bold-text text-3xl transition-all duration-1200 ease-out translate-x-0 starting:-translate-x-70" category="Technology">TECHNOLOGY</x-almanac.almanac-sections>
                    <x-almanac.almanac-sections class="bold-text text-3xl transition-all duration-1200 ease-out translate-y-0 starting:translate-y-70" category="Design & Creative">DESIGN & CREATIVE</x-almanac.almanac-sections>
                    <x-almanac.almanac-sections class="bold-text text-3xl transition-all duration-1200 ease-out translate-x-0 starting:translate-x-70" category="Business Management">BUSINESS MANAGEMENT</x-almanac.almanac-sections>  
                    <x-almanac.almanac-sections class="bold-text text-3xl transition-all duration-1200 ease-out translate-x-0 starting:-translate-x-70" category="Sales & Marketing">SALES & MARKETING </x-almanac.almanac-sections>
                    <x-almanac.almanac-sections class="bold-text text-3xl transition-all duration-1200 ease-out translate-y-0 starting:translate-y-70" category="Finance & Accounting">FINANCE & ACCOUNTING</x-almanac.almanac-sections>
                    <x-almanac.almanac-sections class="bold-text text-3xl transition-all duration-1200 ease-out translate-x-0 starting:translate-x-70" category="Customer Service">CUSTOMER SERVICE</x-almanac.almanac-sections>
                    <x-almanac.almanac-sections class="bold-text text-3xl transition-all duration-1200 ease-out translate-x-0 starting:-translate-x-70" category="Healthcare">HEALTHCARE</x-almanac.almanac-sections>
                    <x-almanac.almanac-sections class="bold-text text-3xl transition-all duration-1200 ease-out translate-y-0 starting:translate-y-70" category="Education">EDUCATION</x-almanac.almanac-sections>
                    <x-almanac.almanac-sections class="bold-text text-3xl transition-all duration-1200 ease-out translate-x-0 starting:translate-x-70" category="Engineering">ENGINEERING</x-almanac.almanac-sections>
                    <x-almanac.almanac-sections class="bold-text text-3xl transition-all duration-1200 ease-out translate-x-0 starting:-translate-x-70" category="Construction & Trades">CONSTRUCTION & TRADES</x-almanac.almanac-sections>
                    <x-almanac.almanac-sections class="bold-text text-3xl transition-all duration-1200 ease-out translate-y-0 starting:translate-y-70" category="Legal">LEGAL</x-almanac.almanac-sections>
                    <x-almanac.almanac-sections class="bold-text text-3xl transition-all duration-1200 ease-out translate-x-0 starting:translate-x-70" category="Media & Communication">MEDIA & COMMUNICATION</x-almanac.almanac-sections>
                    <x-almanac.almanac-sections class="bold-text text-3xl transition-all duration-1200 ease-out translate-x-0 starting:-translate-x-70" category="Hospitality & Tourism">HOSPITALITY & TOURISM</x-almanac.almanac-sections>
                    <x-almanac.almanac-sections class="bold-text text-3xl transition-all duration-1200 ease-out translate-y-0 starting:translate-y-70" category="Logistics & Transportation">LOGISTICS & TRANSPO</x-almanac.almanac-sections>
                    <x-almanac.almanac-sections class="bold-text text-3xl transition-all duration-1200 ease-out translate-x-0 starting:translate-x-70" category="Retail & E-commerce">RETAIL & E-COMMERCE</x-almanac.almanac-sections>
                    <x-almanac.almanac-sections class="bold-text text-3xl transition-all duration-1200 ease-out translate-x-0 starting:-translate-x-70" category="Government & Public Service">GOVERNMENT & PUB. SERVICE</x-almanac.almanac-sections>
                    <x-almanac.almanac-sections class="bold-text text-3xl transition-all duration-1200 ease-out translate-y-0 starting:translate-y-70" category="Science & Research">SCIENCE & RESEARCH</x-almanac.almanac-sections>
                    <x-almanac.almanac-sections class="bold-text text-3xl transition-all duration-1200 ease-out translate-x-0 starting:translate-x-70" category="Agriculture">AGRICULTURE</x-almanac.almanac-sections>
                    <x-almanac.almanac-sections class="bold-text text-3xl transition-all duration-1200 ease-out translate-x-0 starting:-translate-x-70" category="Maintenance & Services">MAINTENANCE & SERVICES</x-almanac.almanac-sections>
                    <x-almanac.almanac-sections class="bold-text text-3xl transition-all duration-1200 ease-out translate-y-0 starting:translate-y-70" category="Arts & Entertainment">ARTS & ENTERTAINMENT</x-almanac.almanac-sections>
                </section>
            @else
                <div class="w-full p-10">
                
                    <div class="relative left-1/2 top-5 -translate-x-1/2 flex justify-center h-15 sm:h-19 bg-black w-screen z-50">

                        <div class="sticky p-2 h-full top-5 z-50 flex rounded-lg flex-row w-[85vw] md:w-[60vw] flex-nowrap items-center justify-between bg-yellow-300 border-3 -skew-x-20 transition-all duration-1000 ease-out translate-x-0 starting:-translate-x-100">
                            <x-button id="back-button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                                </svg>
                                
                                <span class="mx-1">Previous</span>
                            </x-button>

                            <h1 class="uppercase bold-text text-[clamp(1rem,2vw,1.6rem)] font-bold tracking-tight text-black">SORTED BY: {{ \App\Services\StringFormatter::title(request('sort') ?? 'Newest') }}</h1>
                
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
                
                                    <div id="sort-options" class="hidden absolute cursor-pointer bg-yellow-300 border-5">
                                        <x-sort-option sortMethod="newest">Newest</x-sort-option>
                                        <x-sort-option sortMethod="oldest">Oldest</x-sort-option>
                                        <x-sort-option sortMethod="tier">Tier</x-sort-option>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
            
                    {{-- JOBS SECTION --}}
                    <section class=
                    "grid gap-4
                    grid-cols-[repeat(auto-fit,minmax(200px,1fr))]  
                    my-4  
                    sm:grid-cols-[repeat(auto-fit,minmax(240px,1fr))]
                    md:grid-cols-[repeat(auto-fit,minmax(260px,1fr))]
                    lg:grid-cols-[repeat(auto-fit,minmax(280px,1fr))]
                    lg:gap-2
                    lg:my-10
                    xl:grid-cols-5
                    overflow-show
                    transition-all delay-200 opacity-100 duration-1200 ease-in-out translate-y-0 starting:opacity-0 starting:translate-y-50">
                    
                        {{-- JOB CARDS --}}
                        @if ($jobs->isNotEmpty())
                            @foreach ($jobs as $job)
                            
                            <div class="
                                p-3.5
                                rounded-2xl
                                bg-[radial-gradient(circle_at_center,var(--color-gray-200)_60%,var(--color-gray-700)_100%)]
                            ">
                                <x-card-border
                                    :tier="$job->job_tier"
                                    class="
                                        w-full
                                        aspect-3/4        <!-- mobile: tall -->
                                        sm:aspect-4/5     <!-- 3 columns -->
                                        overflow-hidden
                                        flex
                                        rounded-lg
                                        
                                    ">

                                    {{-- JOB CONTENT --}}
                                    <div class="flex w-full flex-col justify-between">

                                        {{-- JOB TITLE --}}
                                        <div class=" mx-2">
                                            <x-job-title :tier="$job['job_tier']">{{ $job['job_title'] ?? 'Unknown Job' }}</x-job-title>
                                        </div>

                                        {{-- JOB IMAGE --}}
                                        <div class="bg-white h-50 mx-3">

                                        </div>

                                        {{-- DESCRIPTION, TIER, SALARY --}}
                                        <div class="flex-1 m-3">
                                            <div class="px-1">
                                                <div class="flex justify-between">
                                                    <x-tier-coloring type="h1" :tier="$job['job_tier']">
                                                        Tier: {{ $job['job_tier'] ?? 'Unknown Tier' }}
                                                    </x-tier-coloring>
                                                    <x-job-salary>{{ $job['salary'] ?? 'Unknown Salary'}}</x-job-salary>
                                                </div>
                                                <x-job-description>{{ $job['description'] ?? 'No description' }}</x-job-description>
                                            </div>
                                        </div>

                                    </div>
                                </x-card-border>
                            </div>
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
            @endif
        </div>

    </div>

</x-layout>