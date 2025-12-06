<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\RegisterUser;
use App\Http\Requests\Auth\RegisterUserRequest;
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
    public function registerUser(RegisterUserRequest $request, RegisterUser $registerUser)
    {

        $user = $registerUser($request->validated());

        Auth::login($user);

        return redirect()->route('home.index');
    }
}
