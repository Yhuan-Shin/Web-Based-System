<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminLogin extends Controller
{
    //
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect('/admin/dashboard')->with('success', 'Logged in successfully');
            } elseif ($user->role == 'user') {
                return redirect('/home')->with('success', 'Logged in successfully');
            } 
        } else {
            $user = Auth::user();
            if($user->role == 'admin'){
                return redirect('/admin')->with('error', 'Invalid credentials');
            }
            elseif($user->role == 'user'){
                return redirect('/')->with('error', 'Invalid credentials');
        }
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin');
    }
}
