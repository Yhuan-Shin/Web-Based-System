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
        if(User::where('role', 'admin')->first()){
            $request->session()->regenerate();
            return redirect('/admin/dashboard');
        } else {
            return redirect('/admin')->with('error', 'Only admin can login');
        }
    } else{
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
