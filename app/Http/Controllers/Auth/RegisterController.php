<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\RegisterUser;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{

    /**
     * Show the register form
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Register the user
     */
    public function register(RegisterUserRequest $request, RegisterUser $registerUser)
    {
        // validate input then pass the validated data to the auth action to store the user

        $user = $registerUser($request->validated());
        
        // login the created user

        Auth::login($user);

        // redirect to dashboard (or home)

        return redirect()->route('home.index');

    }
}
