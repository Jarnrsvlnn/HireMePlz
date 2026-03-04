@props(['formType' => 'create','job'])
@aware(['errors'])

{{-- UPDATE FORM --}}
@if ($formType == 'update')
    <x-modal-base>
        <div class="px-6 py-5 border-7 bg-yellow-300 rounded-lg shadow-xl">
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
                            class="block w-full px-4 py-2 mt-2 bg-white -skew-x-5 border-5 border-black text-black">
                        
                        <x-form-error name="job_title"/>
                    </div>
                    {{-- SALARY --}}
                    <div>
                        <x-form-label>Salary</x-form-label>
                        <input value="{{ $job->salary }}" name="salary" type="text"
                            class="block w-full px-4 py-2 mt-2 bg-white -skew-x-5 border-5 border-black text-black">
                        
                        <x-form-error name="salary"/>
                    </div>
                    {{-- JOB TIER --}}
                    <div>
                        <x-form-label>Job Tier</x-form-label>
                        <select name="job_tier"
                            class="block w-full px-4 py-2 mt-2 bg-white -skew-x-5 border-5 border-black text-black">
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
                        <textarea name="description" class="block p-2 w-full h-32 mt-2 bg-white -skew-x-5 border-5 border-black text-black">{{ $job->description }}</textarea>
                        
                        <x-form-error name="description"/>
                    </div>
                </div>
                {{-- BUTTONS --}}
                <div class="mt-5 flex justify-end gap-3">
                    <x-button buttonType='button' id="close-dialog" type="button" formmethod="dialog"
                        class="px-4 py-2 text-white">
                        Close
                    </x-button>
                    <x-button buttonType='button' type="submit"
                        class="px-4 py-2 text-white">
                        Save
                    </x-button>
                </div>
            </form>
        </div>
    </x-modal-base>
    
{{-- CREATE FORM --}}
@else
    <x-modal-base>
        <div class="px-6 py-5v bg-yellow-300 border-7 border-black shadow-xl">
            <h2 class="text-lg bold-text">
                CREATE JOB
            </h2>

            <form action="{{ route('jobs.store') }}" method="POST" class="mt-4">
                @csrf
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    {{-- JOB TITLE --}}
                    <div>
                        <x-form-label>Job Title</x-form-label>
                        <input id="job_title" name="job_title" type="text" placeholder="ex. Software Engineer" 
                            class="block w-full px-4 py-2 mt-2 bg-white -skew-x-5 border-5 border-black text-black">
                        
                        <x-form-error name="job_title"/>
                    </div>
                    {{-- SALARY --}}
                    <div>
                        <x-form-label>Salary</x-form-label>
                        <input name="salary" type="text" placeholder="ex. $67" required
                            class="block w-full px-4 py-2 mt-2 bg-white -skew-x-5 border-5 border-black text-black">
                    
                        <x-form-error name="salary"/>
                    </div>
                    {{-- JOB CATEGORY --}}
                    <div>
                        <x-form-label>Category</x-form-label>
                        <select name="category" required
                            class="block w-full px-4 py-2 mt-2 bg-white -skew-x-5 border-5 border-black text-black">

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
                            <option value="Maintenance & Services">Maintenance & Services</option>
                            <option value="Arts & Entertainment">Arts & Entertainment</option>
                            <option value="Other">Other</option>

                        </select>

                        <x-form-error name="category"/>
                    </div>
                    {{-- DESCRIPTION --}}
                    <div class="sm:col-span-2">
                        <x-form-label>Description</x-form-label>
                        <textarea required name="description" placeholder="Write details..." class="p-2 block w-full h-32 mt-2 bg-white -skew-x-5 border-5 border-black text-black"></textarea>
                            
                        <x-form-error name="description"/>
                    </div>

                    {{-- JOB TIER --}}
                    <div>
                        <x-form-label>Job Tier</x-form-label>
                        <select name="job_tier" required
                            class="block w-full px-4 py-2 mt-2 bg-white -skew-x-5 border-5 border-black text-black">
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
                <div class="mt-5 flex justify-end gap-1 pb-3">
                    <x-button buttonType='button' id="close-dialog" type="button" formmethod="dialog"
                        class="px-4 py-2 text-white">
                        Close
                    </x-button>
                    <x-button buttonType='button' type="submit" class="px-4 py-2 text-white">
                        Create
                    </x-button>
                </div>
            </form>
        </div>
    </x-modal-base>

@endif
