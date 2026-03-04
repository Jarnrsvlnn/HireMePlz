<x-auth-layout>
    <x-slot:title>
      Login
    </x-slot:title>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm transition-all duration-800 ease-out opacity-100 translate-y-0 starting:opacity-50 starting:-translate-y-5">  
        <x-hmp-logo class="mx-auto h-30 w-auto -skew-x-10" />
        <h2 class="mt-20 text-center text-[clamp(1rem,2vw,1.6rem)] font-bold tracking-tight text-white">Log in to your account</h2>
      </div>
    
      <div class="mt-1 sm:mx-auto sm:w-full sm:max-w-sm transition-all duration-800 ease-out opacity-100 translate-y-0 starting:opacity-50 starting:translate-y-5">
        <form action="{{ route('login.loginUser') }}" method="POST" class="space-y-6">
          @csrf
  
          <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-100">Email address</label>
            <div class="mt-2">
              <input value="{{ old('email') }}" required id="email" type="email" name="email" class="block border-4 w-full rounded-md 
              bg-[rgb(50,50,50)] text-black
              px-3 py-2
              placeholder:text-gray-300
              autofill:bg-black autofill:text-white
              [:-webkit-autofill]:shadow-[0_0_0px_1000px_white_inset]
              [:-webkit-autofill]:text-black"/>z
            </div>

            <x-form-error name="email"/>
          </div>

          <div>
            <div class="flex items-center justify-between">
              <label for="password" class="block text-sm/6 font-medium text-gray-100">Password</label>
              <div class="text-sm">
                <a href="#" class="font-semibold text-indigo-400 hover:text-indigo-300">Forgot password?</a>
              </div>
            </div>
            <div class="mt-2">
              <input required id="password" type="password" name="password" class="block border-4 w-full rounded-md 
              bg-black text-white
              px-3 py-2
              placeholder:text-gray-300
              autofill:bg-black autofill:text-white
              [:-webkit-autofill]:shadow-[0_0_0px_1000px_white_inset]
              [:-webkit-autofill]:text-white"/>
            </div>

            <x-form-error name="password"/>
          </div>
    
          <div>
            <button type="submit" class="flex w-full justify-center rounded-lg bg-yellow-300 border-4 border-black px-3 py-1.5 text-sm/6 font-semibold text-black cursor-pointer">Login</button>
          </div>
        </form>
    
        <p class="mt-10 text-center text-sm/6 text-gray-400">
          Don't have an account?
          <a href="{{ route('register.showRegister') }}" class="font-semibold text-indigo-400 hover:text-indigo-300">Register</a>
        </p>
      </div>
    </div>

  </x-auth-layout>
    
  