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
    public function loginUser(LoginUserRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            // Invalid credentials
            return back()
                ->withErrors(['email' => 'Invalid credentials'])
                ->withInput();
        }

        // Regenerate session to prevent fixation
        $request->session()->regenerate();

        return redirect()->route('home.index');
    }   

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}
