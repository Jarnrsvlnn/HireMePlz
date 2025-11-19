<x-layout>
    <div class="flex flex-col gap-5 justify-between mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <x-slot:header>
            Job Details / {{ $job['job_title'] }}    
        </x-slot:header>
        {{-- BUTTONS SECTION --}}

        <section id="job-details-btns-section" class="flex flex-row justify-between">
            <button id="back-button" class="flex items-center px-4 py-2 h-10 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                </svg>
                
                <span class="mx-1">Previous Page</span>
            </button>
            <button id="open-dialog" class="flex w-25 cursor-pointer items-center px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                </svg>
                <span class="mx-1">Edit</span>
            </button>
        </section>


        <section class="bg-white dark:bg-gray-900">
            <div class="container px-6 py-10 mx-auto">
                <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">{{ $job['job_title'] }}</h1>
        
                <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">

                    <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96" src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"alt="">
    
                    <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                        <x-tier-coloring type="p" :tier="$job['job_tier']">
                            Tier: {{ $job['job_tier'] }}
                        </x-tier-coloring>
                        <h2 class="block mt-4 text-2xl font-semibold text-gray-800 dark:text-white">What does these <em>employed</em> beings even do?!</h2>
                        <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 md:text-sm">{{ $job['description'] }}</p> 
        
                        <div class="flex items-center mt-6">
                            <div class="mx-4">
                                <h1 class="text-xl text-gray-700 dark:text-gray-200">Average Salary</h1>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $job['salary'] }}</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>

        <dialog id="edit-dialog">
            <button id="close-dialog" class="flex w-25 cursor-pointer items-center px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                </svg>
                  
                <span class="mx-1">Close</span>
            </button>
            <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
                <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Input Job Details</h2>
                <form action="{{ route('jobs.update', $job) }}" method="POST"> 
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                        {{-- JOB TITLE --}}
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="username">Job Title</label>
                            <input value="{{ $job->job_title }}" id="job_title" name="job_title" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>
                        
                        {{-- SALARY --}}
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="emailAddress">Salary</label>
                            <input value="{{ $job->salary }}"id="salary" name="salary" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>

                        {{-- JOB TIER --}}
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="job_tier">Job Tier</label>
                            <select name="job_tier" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                <option value="Godlike" {{ $job->job_tier == 'Godlike' ? 'selected' : '' }}>Godlike</option>
                                <option value="Legendary" {{ $job->job_tier == 'Legendary' ? 'selected' : '' }}>Legendary</option>
                                <option value="Epic" {{ $job->job_tier == 'Epic' ? 'selected' : '' }}>Epic</option>  
                                <option value="Kinda mid" {{ $job->job_tier == 'Kinda mid' ? 'selected' : '' }}>Kinda mid</option>
                                <option value="Uncommon" {{ $job->job_tier == 'Uncommon' ? 'selected' : '' }}>Uncommon</option>
                                <option value="Common" {{ $job->job_tier == 'Common' ? 'selected' : '' }}>Common</option>
                            </select>
                        </div>
            
                        {{-- DESCRIPTION --}}
                        <div>
                            <label for="description" class="block text-sm text-gray-500 dark:text-gray-300">Description</label>
                            <textarea id="description" name="description" placeholder="Write details..." class="block  mt-2 w-full  placeholder-gray-400/70 dark:placeholder-gray-500 rounded-lg border border-gray-200 bg-white px-4 h-32 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300">{{ $job->description }}</textarea>
                        </div>
                    </div>
            
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Update</button>
                    </div>
    
                </form>
            </section>
        </dialog>

    </div>
</x-layout>
