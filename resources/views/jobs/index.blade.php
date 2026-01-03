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
                    <div>
                        <x-button id="sort-button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                            </svg>     
                        <span class="mx-1">Sort</span>    
                        </x-button>

                        <div id="sort-options" class="hidden absolute cursor-pointer rounded-lg bg-blue-200">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'newest']) }}" class="block px-4 py-2 hover:bg-gray-100">Newest</a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'oldest']) }}" class="block px-4 py-2 hover:bg-gray-100">Oldest</a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'tier']) }}" class="block px-4 py-2 hover:bg-gray-100">Tier</a>
                        </div>
                    </div>
                    
                    {{-- CREATE BUTTON --}}
                    <x-button id='open-dialog'>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <span class="mx-1">Create</span>
                    </x-button>
                </div>

            </div>
    
            {{-- JOBS SECTION --}}
            <section class="flex-1 items-center grid gap-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:grid-rows-4"> 
                {{-- JOB CARDS --}}
                @if (auth()->user()->jobs->isNotEmpty())
                    @foreach ($jobs as $job)
                            
                    <x-card-border :tier="$job->job_tier">
                        <div class="flex-1 bg-cover" style="background-image: url('https://images.unsplash.com/photo-1494726161322-5360d4d0eeae?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80')"></div>
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
                                                <form class="w-full flex-1" action="{{ route('jobs.destroy', $job) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="flex items-center justify-center w-full h-full px-2 py-1 font-bold text-white uppercase transition-colors duration-300 transform  rounded  bg-red-500 hover:bg-red-400 dark:hover:bg-red-400 focus:outline-none focus:bg-gray-700 dark:focus:bg-red-400"><svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-7 md:h-6" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                </form>
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
    
            {{-- PAGINATION --}}
            @if ($jobs->hasPages())
                <footer class="flex">
                    <div class="flex flex-1 justify-between flex-col">
                        {{ $jobs->links() }}
                    </div>
                </footer>
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
    <x-dialog-modal :errors="$errors" formType='create'></x-dialog-modal>
</x-layout> 