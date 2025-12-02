<x-layout>
    <x-slot:title>
        Details {{ $job->job_title }}
    </x-slot:title>
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
                                <p class="text-1xl text-gray-200 dark:text-gray-200">{{ $job['salary'] }}</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>



    </div>

    <dialog id="edit-dialog" class="p-0 rounded-lg w-full max-w-lg backdrop:bg-black/50" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">

        <div class="px-6 py-5 bg-white dark:bg-gray-900 rounded-lg shadow-xl">

            <h2 class="text-lg font-semibold text-gray-700 dark:text-white">
                Input Job Details
            </h2>

            <form action="{{ route('jobs.update', $job) }}" method="POST" class="mt-4">

                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
    
                    {{-- JOB TITLE --}}

                    <div>
                        <label class="text-gray-700 dark:text-gray-200">Job Title</label>
                        <input value="{{ $job->job_title }}" name="job_title" type="text"
                            class="block w-full px-4 py-2 mt-2 rounded-md border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                    </div>

                    {{-- SALARY --}}

                    <div>
                        <label class="text-gray-700 dark:text-gray-200">Salary</label>
                        <input value="{{ $job->salary }}" name="salary" type="text"
                            class="block w-full px-4 py-2 mt-2 rounded-md border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                    </div>

                    {{-- JOB TIER --}}

                    <div>
                        <label class="text-gray-700 dark:text-gray-200">Job Tier</label>
                        <select name="job_tier"
                            class="block w-full px-4 py-2 mt-2 rounded-md border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                            <option value="Godlike" {{ $job->job_tier == 'Godlike' ? 'selected' : '' }}>Godlike</option>
                            <option value="Legendary" {{ $job->job_tier == 'Legendary' ? 'selected' : '' }}>Legendary</option>
                            <option value="Epic" {{ $job->job_tier == 'Epic' ? 'selected' : '' }}>Epic</option>
                            <option value="Kinda mid" {{ $job->job_tier == 'Kinda mid' ? 'selected' : '' }}>Kinda mid</option>
                            <option value="Uncommon" {{ $job->job_tier == 'Uncommon' ? 'selected' : '' }}>Uncommon</option>
                            <option value="Common" {{ $job->job_tier == 'Common' ? 'selected' : '' }}>Common</option>
                        </select>
                    </div>

                    {{-- DESCRIPTION --}}

                    <div class="sm:col-span-2">
                        <label class="text-gray-700 dark:text-gray-200">Description</label>
                        <textarea name="description" class="block w-full h-32 mt-2 rounded-lg border-gray-200 bg-white dark:bg-gray-900 dark:border-gray-600 dark:text-gray-300">{{ $job->description }}</textarea>
                    </div>
                </div>

                {{-- BUTTONS --}}

                <div class="mt-5 flex justify-end gap-3">
                    <button id="close-dialog" type="button" formmethod="dialog"
                        class="px-4 py-2 border rounded-md text-white dark:border-gray-700">
                        Close
                    </button>

                    <button type="submit"
                        class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-500">
                        Update
                    </button>

                    <button type="submit" onclick="console.log('Submitting!')">Submit</button>
                </div>

            </form>

        </div>

    </dialog>
    
</x-layout>
