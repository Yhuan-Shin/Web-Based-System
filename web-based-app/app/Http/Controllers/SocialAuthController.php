<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // Check if the user already exists in the database
        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            Auth::guard('user')->login($existingUser, true);  // Specify the 'user' guard
            return redirect()->to('/dashboard');
        }

        // If the user doesn't exist, create a new user
        $newUser = User::create([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'google_id' => $user->getId(),
            'avatar' => $user->getAvatar(),
            'role' => 'user',
            'address' => 'null',
            'phone_number' => 'null',
            'relation' => 'Parent',

        ]);

        Auth::guard('user')->login($newUser, true);  // Specify the 'user' guard
        return redirect()->to('/dashboard');
    }

    // public function redirectToFacebook()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }

    // public function handleFacebookCallback()
    // {
    //     $user = Socialite::driver('facebook')->user();

    //     $existingUser = User::where('email', $user->getEmail())->first();

    //     if ($existingUser) {
    //         Auth::login($existingUser);
    //         return redirect()->to('/home');
    //     }

    //     $newUser = User::create([
    //         'name' => $user->getName(),
    //         'email' => $user->getEmail(),
    //         'facebook_id' => $user->getId(),
    //         'avatar' => $user->getAvatar(),
    //     ]);

    //     Auth::login($newUser);
    //     return redirect()->to('/home');
    // }
}

