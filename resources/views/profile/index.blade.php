<x-layout>
    <x-slot:title>
        Profile
    </x-slot:title>
    <x-slot:header>
        Profile
    </x-slot:header>

    <section class="flex flex-col max-w-3xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 m-10">
    
        {{-- AVATAR SECTION --}}
        <div class="flex justify-center items-center bg-gray-400 flex-1 min-h-70">
            <div class="rounded-full bg-white size-40"></div>
        </div>

        {{-- INFORMATION SECTION --}}
        <form class="flex-1" action="{{ route('profile.update') }}" method="POST">   
            @csrf
            @method('PATCH')
            <div class="grid grid-cols-1 gap-6 mt-5 sm:grid-cols-2">
                <div>
                    <x-form-label for="first_name">First name</x-form-label>
                    <x-form-input value="{{ auth()->user()->first_name }}" name="first_name" id="first_name" type="text"/>
                </div>

                <x-form-error name="first_name"/>

                <div>
                    <x-form-label for="last_name">Last name</x-form-label>
                    <x-form-input value="{{ auth()->user()->last_name }}" name="last_name" id="last_name" type="text"/>
                </div>

                <x-form-error name="last_name"/>
    
                <div>
                    <x-form-label for="secondary_email">Secondary Email</x-form-label>
                    <x-form-input value="{{ auth()->user()->secondary_email }}" name="secondary_email" id="secondary_email" type="email"/>
                </div>

                <x-form-error name="secondary_email"/>

                <div>
                    <x-form-label for="phone_number">Phone Number</x-form-label>
                    <x-form-input value="{{ auth()->user()->phone_number }}" name="phone_number" id="phone_number" type="text"/>
                </div>
                
                <x-form-error name="phone_number"/>
    
            </div>  
    
            <div class="flex justify-end mt-6">
                <button type="submit" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save changes</button>
            </div>
        </form>
    </section>
</x-layout>