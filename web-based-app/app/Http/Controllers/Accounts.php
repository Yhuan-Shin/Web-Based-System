<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class Accounts extends Controller
{
    //
    
    public function register(Request $request){
        $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15|unique:users',
            'relation' => 'nullable|string|max:255',
            'password' => 'required|string|min:8|confirmed|regex:/[a-zA-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
        ]);

        try{
            $data = [
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'email' => $request->email,
                'role' => $request->role,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'relation' => $request->relation,
                'password' => bcrypt($request->password),
            ];

            if ($request->role == 'teacher') {
                $data['section'] = $request->section;
            }

            User::create($data);
            

            return redirect()->back()->with('success', 'Account created successfully');

        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Unable to create account');
        }
    }
}
