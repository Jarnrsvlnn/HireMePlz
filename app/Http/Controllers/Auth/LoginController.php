<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\LoginUser;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserRequest;

class LoginController extends Controller
{

    /**
     * Show the register form
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Register the user
     */
    public function login(LoginUserRequest $request, LoginUser $loginUser)
    {
        // validate input then pass the validated data to the auth action to store the user

        $user = $loginUser($request->validated());
        
        // login the created user

        Auth::login($user);

        // redirect to dashboard (or home)

        return redirect()->route('home.index');

    }
}
