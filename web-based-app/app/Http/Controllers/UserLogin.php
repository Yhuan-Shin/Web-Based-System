<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
class UserLogin extends Controller
{   
    //
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Attempt to log the user in
        if (Auth::guard('user')->attempt($credentials)) {
            $user = Auth::guard('user')->user();
            if ($user->role == 'parent') {
                $request->session()->regenerate(); 
                return redirect('/home');
            } else if ($user->role == 'admin') {
                return redirect()->back()->with('error', 'Unable to login'); 
            }
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    
        public function logout(Request $request)
    {
        Auth::guard('user')->logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
