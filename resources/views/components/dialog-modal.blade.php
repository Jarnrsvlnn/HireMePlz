@props(['formType' => 'create','job'])
@aware(['errors'])

{{-- UPDATE FORM --}}
@if ($formType == 'update')
    <x-modal-base>
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
                        <x-form-label>Job Title</x-form-label>
                        <input value="{{ $job->job_title }}" name="job_title" type="text"
                            class="block w-full px-4 py-2 mt-2 rounded-md border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                        
                        <x-form-error name="job_title"/>
                    </div>
                    {{-- SALARY --}}
                    <div>
                        <x-form-label>Salary</x-form-label>
                        <input value="{{ $job->salary }}" name="salary" type="text"
                            class="block w-full px-4 py-2 mt-2 rounded-md border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                        
                        <x-form-error name="salary"/>
                    </div>
                    {{-- JOB TIER --}}
                    <div>
                        <x-form-label>Job Tier</x-form-label>
                        <select name="job_tier"
                            class="block w-full px-4 py-2 mt-2 rounded-md border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                            <option value="Godlike" {{ $job->job_tier == 'Godlike' ? 'selected' : '' }}>Godlike</option>
                            <option value="Legendary" {{ $job->job_tier == 'Legendary' ? 'selected' : '' }}>Legendary</option>
                            <option value="Epic" {{ $job->job_tier == 'Epic' ? 'selected' : '' }}>Epic</option>
                            <option value="Kinda mid" {{ $job->job_tier == 'Kinda mid' ? 'selected' : '' }}>Kinda mid</option>
                            <option value="Uncommon" {{ $job->job_tier == 'Uncommon' ? 'selected' : '' }}>Uncommon</option>
                            <option value="Common" {{ $job->job_tier == 'Common' ? 'selected' : '' }}>Common</option>
                        </select>

                        <x-form-error name="job_tier"/>
                    </div>
                    {{-- DESCRIPTION --}}
                    <div class="sm:col-span-2">
                        <x-form-label>Description</x-form-label>
                        <textarea name="description" class="block p-2 border w-full h-32 mt-2 rounded-lg border-gray-200 bg-white dark:bg-gray-900 dark:border-gray-600 dark:text-gray-300">{{ $job->description }}</textarea>
                        
                        <x-form-error name="description"/>
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
    </x-modal-base>
    
{{-- CREATE FORM --}}
@else
    <x-modal-base>
        <div class="px-6 py-5 bg-white dark:bg-gray-900 rounded-lg shadow-xl">
            <h2 class="text-lg font-semibold text-gray-700 dark:text-white">
                Create Job
            </h2>

            <form action="{{ route('jobs.store') }}" method="POST" class="mt-4">
                @csrf
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    {{-- JOB TITLE --}}
                    <div>
                        <x-form-label>Job Title</x-form-label>
                        <input id="job_title" name="job_title" type="text" placeholder="ex. Software Engineer" 
                            class="block w-full px-4 py-2 mt-2 rounded-md border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                        
                        <x-form-error name="job_title"/>
                    </div>
                    {{-- SALARY --}}
                    <div>
                        <x-form-label>Salary</x-form-label>
                        <input name="salary" type="text" placeholder="ex. $67" required
                            class="block w-full px-4 py-2 mt-2 rounded-md border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                    
                        <x-form-error name="salary"/>
                    </div>
                    {{-- JOB TIER --}}
                    <div>
                        <x-form-label>Job Tier</x-form-label>
                        <select name="job_tier" required
                            class="block w-full px-4 py-2 mt-2 rounded-md border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">

                            <option value="Technology">Technology</option>
                            <option value="Design & Creative">Design & Creative</option>
                            <option value="Business Management">Business Management</option>  
                            <option value="Sales & Marketing">Sales & Marketing</option>
                            <option value="Finance & Accounting">Finance & Accounting</option>
                            <option value="Customer Service">Customer Service</option>
                            <option value="Healthcare">Healthcare</option>
                            <option value="Education">Education</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Construction & Trades">Construction & Trades</option>
                            <option value="Legal">Legal</option>
                            <option value="Media & Communication">Media & Communication</option>
                            <option value="Hospitality & Tourism">Hospitality & Tourism</option>
                            <option value="Logistics & Transportation">Logistics & Transportation</option>
                            <option value="Retail & E-commerce">Retail & E-commerce</option>
                            <option value="Government & Public Service">Government & Public Service</option>
                            <option value="Science & Research', 'Agriculture">Science & Research', 'Agriculture</option>
                            <option value="Maintenance $ Services">Maintenance $ Services</option>
                            <option value="Arts & Entertainment">Arts & Entertainment</option>
                            <option value="Other">Other</option>
                        </select>

                        <x-form-error name="category"/>
                    </div>
                    {{-- DESCRIPTION --}}
                    <div class="sm:col-span-2">
                        <x-form-label>Description</x-form-label>
                        <textarea required name="description" placeholder="Write details..." class="p-2 block border w-full h-32 mt-2 rounded-lg border-gray-200 bg-white dark:bg-gray-900 dark:border-gray-600 dark:text-gray-300"></textarea>
                            
                        <x-form-error name="description"/>
                    </div>

                    {{-- JOB CATEGORY --}}
                    <div>
                        <x-form-label>Category</x-form-label>
                        <select name="category" required
                            class="block w-full px-4 py-2 mt-2 rounded-md border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                            <option value="Godlike">Godlike</option>
                            <option value="Legendary">Legendary</option>
                            <option value="Epic">Epic</option>  
                            <option value="Kinda mid">Kinda mid</option>
                            <option value="Uncommon">Uncommon</option>
                            <option value="Common">Common</option>
                        </select>

                        <x-form-error name="job_tier"/>
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
    </x-modal-base>

@endif
