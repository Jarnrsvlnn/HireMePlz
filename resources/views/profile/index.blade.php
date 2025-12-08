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
                    <label class="text-gray-700 dark:text-gray-200" for="first_name">First name</label>
                    <input value="{{ auth()->user()->first_name }}" name="first_name" id="first_name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                </div>

                @error('first_name')
                    <p class="text-xs italic text-red-500 font-semibold">{{ $message }}</p>
                @enderror

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="last_name">Last name</label>
                    <input value="{{ auth()->user()->last_name }}" name="last_name" id="last_name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                </div>

                @error('last_name')
                    <p class="text-xs italic text-red-500 font-semibold">{{ $message }}</p>
                @enderror
    
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="secondary_email">Secondary Email</label>
                    <input value="{{ auth()->user()->secondary_email }}" name="secondary_email" id="secondary_email" type="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                </div>

                @error('secondary_email')
                    <p class="text-xs italic text-red-500 font-semibold">{{ $message }}</p>
                @enderror

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="phone_number">Phone</label>
                    <input value="{{ auth()->user()->phone_number }}" name="phone_number" id="phone_number" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                </div>
                
                @error('phone_number')
                    <p class="text-xs italic text-red-500 font-semibold">{{ $message }}</p>
                @enderror
    
            </div>
    
            <div class="flex justify-end mt-6">
                <button type="submit" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save changes</button>
            </div>
        </form>
    </section>
</x-layout>