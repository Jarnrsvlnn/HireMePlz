<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Actions\Profile\UpdateProfile;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function update(UpdateProfileRequest $request, UpdateProfile $updateProfile)
    {
        $user = $request->user();
        $updateProfile($user, $request->validated());

        return redirect()->route('profile.index')->with('success', 'Updated');
    }
}
