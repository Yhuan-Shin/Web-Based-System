<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AdminLogin extends Controller
{
    //
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            $user = Auth::guard('admin')->user(); // Get the authenticated user
            if ($user->role === 'admin') { // Check the role properly
                $request->session()->regenerate();
                return redirect('/admin/dashboard')->with('success', 'Logged in successfully');
            }
            else {
                return redirect('/admin')->with('error', 'Admin only');
            }
        }
    else {
            return redirect('/admin')->with('error', 'Invalid credentials');
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
