<x-layout>
    <x-slot:title>
        View Jobs
    </x-slot:title>
    <div class="flex gap-10 flex-row mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <x-slot:header>
            Jobs / All
        </x-slot:header>
    
        {{-- BACK BUTTON --}}
        <button id="back-button" class="flex items-center sticky top-10 px-4 py-2 h-10 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
            </svg>
                
            <span class="mx-1">Previous Page</span>
        </button>
    
        <section class="grid grid-cols-2 gap-8">
            @foreach ($jobs as $job)
                <div class="flex max-w-md overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div class="w-1/3 bg-cover" style="background-image: url('https://images.unsplash.com/photo-1494726161322-5360d4d0eeae?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80')"></div>
                
                    <div class="w-2/3 p-4 md:p-4">
                        <h1 class="text-xl font-bold text-gray-800 dark:text-white">{{ $job['job_title'] }}</h1>
                
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ $job['description'] }}</p>
                
                        <div class="flex mt-2 item-center">
                            <x-tier-coloring type="h1" :tier="$job['job_tier']">
                                Tier: {{ $job['job_tier'] }}
                            </x-tier-coloring>
                        </div>
                
                        <div class="flex justify-between mt-3 item-center">
                            <h1 class="text-lg font-bold text-gray-700 dark:text-gray-200 md:text-xl">{{ $job['salary'] }}</h1>

                            {{-- BUTTONS --}}
                            <div class="flex flex-row gap-2">
                                <form action="{{ route('jobs.destroy', $job) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-2 py-1 text-xs font-bold text-white uppercase transition-colors duration-300 transform  rounded  bg-red-500 hover:bg-red-400 dark:hover:bg-red-400 focus:outline-none focus:bg-gray-700 dark:focus:bg-red-400">Remove</button>
                                </form>
                                <a href="{{ route('jobs.show', $job) }}" class="px-2 py-1 text-xs font-bold text-white uppercase transition-colors duration-300 transform bg-gray-800 rounded dark:bg-gray-700 hover:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-700 dark:focus:bg-gray-600">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
        </section>

    </div>
</x-layout> 