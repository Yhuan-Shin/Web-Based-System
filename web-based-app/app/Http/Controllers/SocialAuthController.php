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
            if(is_null($existingUser->address && $existingUser->phone_number)){
                return view('auth/add_address_phone');
            }
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
        return redirect()->to('/profile');
    }
    public function add_address_phone(Request $request){
        $request->validate([
            'address' => 'required|string|max:255',
        ]);
    
        $user = Auth::guard('user')->user();
        $user->address = $request->input('address');
        $user->phone_number = $request->input('phone_number');
        User::where('id', $user->id)->update(['address' => $user->address, 'phone_number' => $user->phone_number]);
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

