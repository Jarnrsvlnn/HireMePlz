@props(['formType' => 'create','job'])
@aware(['errors'])

{{-- UPDATE FORM --}}
@if ($formType == 'update')
    <dialog class="p-0 rounded-lg w-full max-w-lg backdrop:bg-black/50" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <div class="px-6 py-5 bg-white dark:bg-gray-900 rounded-lg shadow-xl">
            <h2 class="text-lg font-semibold text-gray-700 dark:text-white">
                Update Job
            </h2>

            <form action="{{ route('jobs.update', $job) }}" method="POST" class="mt-4">
                @csrf
                @method('PATCH')
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
                        Cancel
                    </button>
                    <x-button buttonType='button' type="submit"
                        class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-500">
                        Save
                    </x-button>
                </div>
            </form>
        </div>
    </dialog>
    
    {{-- CREATE FORM --}}
@else
    <dialog class="p-0 rounded-lg w-full max-w-lg backdrop:bg-black/50" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <div class="px-6 py-5 bg-white dark:bg-gray-900 rounded-lg shadow-xl">
            <h2 class="text-lg font-semibold text-gray-700 dark:text-white">
                Create Job
            </h2>

            <form action="{{ route('jobs.store') }}" method="POST" class="mt-4">
                @csrf
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    {{-- JOB TITLE --}}
                    <div>
                        <label class="text-gray-700 dark:text-gray-200">Job Title</label>
                        <input id="job_title" name="job_title" type="text" placeholder="ex. Software Engineer" 
                            class="block w-full px-4 py-2 mt-2 rounded-md border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                    </div>
                    {{-- SALARY --}}
                    <div>
                        <label class="text-gray-700 dark:text-gray-200">Salary</label>
                        <input name="salary" type="text" placeholder="ex. $67" required
                            class="block w-full px-4 py-2 mt-2 rounded-md border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                    </div>
                    {{-- JOB TIER --}}
                    <div>
                        <label class="text-gray-700 dark:text-gray-200">Job Tier</label>
                        <select name="job_tier" required
                            class="block w-full px-4 py-2 mt-2 rounded-md border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                            <option value="Godlike">Godlike</option>
                            <option value="Legendary">Legendary</option>
                            <option value="Epic">Epic</option>  
                            <option value="Kinda mid">Kinda mid</option>
                            <option value="Uncommon">Uncommon</option>
                            <option value="Common">Common</option>
                        </select>
                    </div>
                    {{-- DESCRIPTION --}}
                    <div class="sm:col-span-2">
                        <label class="text-gray-700 dark:text-gray-200">Description</label>
                        <textarea required name="description" placeholder="Write details..." class="block w-full h-32 mt-2 rounded-lg border-gray-200 bg-white dark:bg-gray-900 dark:border-gray-600 dark:text-gray-300"></textarea>
                    </div>
                </div>
                {{-- BUTTONS --}}
                <div class="mt-5 flex justify-end gap-3">
                    <button id="close-dialog" type="button" formmethod="dialog"
                        class="px-4 py-2 border rounded-md text-white dark:border-gray-700">
                        Close
                    </button>
                    <x-button buttonType='button' type="submit">
                        Add
                    </x-button>
                </div>
            </form>
        </div>
    </dialog>

@endif
