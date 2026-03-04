<x-auth-layout>
  <x-slot:title>
    Register
  </x-slot:title>
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 h-full">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm transition-all duration-800 ease-out opacity-100 translate-y-0 starting:opacity-50 starting:-translate-y-5">  
      <x-hmp-logo class="mx-auto h-30 w-auto" />
      <h2 class="mt-10 text-center text-[clamp(1rem,2vw,1.6rem)] font-bold tracking-tight text-white">Create your account</h2>
    </div>
  
    <div class="mt-1 sm:mx-auto sm:w-full sm:max-w-sm transition-all duration-800 ease-out opacity-100 translate-y-0 starting:opacity-50 starting:translate-y-5">
      <form action="{{ route('register.registerUser') }}" method="POST" class="space-y-6">

        @csrf
      
        {{-- USERNAME --}}
        <div>
          <label for="name" class="block text-sm/6 font-medium text-gray-100">Username</label>
          <div class="mt-2">
            <input id="name" type="text" name="name" required class="block border-4 w-full rounded-md 
              bg-[rgb(50,50,50)] text-black
              px-3 py-2
              placeholder:text-gray-300
              autofill:bg-black autofill:text-white
              [:-webkit-autofill]:shadow-[0_0_0px_1000px_white_inset]
              [:-webkit-autofill]:text-black"/>
          </div>

          <x-form-error name="name"/>
        </div>

        {{-- EMAIL --}}
        <div class="">
          <label for="email" class="block text-sm/6 font-medium text-gray-100">Email address</label>
          <div class="mt-2">
            <input id="email" type="email" name="email" required class="block border-4 w-full rounded-md 
              bg-white text-black
              px-3 py-2
              placeholder:text-gray-300
              autofill:bg-black autofill:text-white
              [:-webkit-autofill]:shadow-[0_0_0px_1000px_white_inset]
              [:-webkit-autofill]:text-black"/>
          </div>

          <x-form-error name="email"/>
        </div>

        {{-- PASSWORD --}}
        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm/6 font-medium text-gray-100">Password</label>
          </div>
          <div class="mt-2">
            <input id="password" type="password" name="password" required class="block border-4 w-full rounded-md 
              bg-white text-black
              px-3 py-2
              placeholder:text-gray-300
              autofill:bg-black autofill:text-white
              [:-webkit-autofill]:shadow-[0_0_0px_1000px_white_inset]
              [:-webkit-autofill]:text-black"/>
          </div>

          <x-form-error name="password"/>
        </div>

        {{-- CONFIRM PASSWORD --}}
        <div>
          <div class="flex items-center justify-between">
            <label for="password_confirmation" class="block text-sm/6 font-medium text-gray-100">Confirm Password</label>
          </div>
          <div class="mt-2">
            <input id="password_confirmation" type="password" name="password_confirmation" required class="block border-4 w-full rounded-md 
              bg-white text-black
              px-3 py-2
              placeholder:text-gray-300
              autofill:bg-black autofill:text-white
              [:-webkit-autofill]:shadow-[0_0_0px_1000px_white_inset]
              [:-webkit-autofill]:text-black"/>
          </div>

          <x-form-error name="password_confirmation"/>
        </div>
  
        <div>
          <button type="submit" class="flex w-full justify-center bg-yellow-300 border-4 border-black px-3 py-1.5 text-sm/6 font-semibold text-black">Sign in</button>
        </div>
      </form>
  
      <p class="mt-10 text-center text-sm/6 text-gray-400">
        Already have an account?
        <a href="{{ route('login') }}" class="font-semibold text-indigo-400 hover:text-indigo-300">Login</a>
      </p>
    </div>
  </div>
</x-auth-layout>

