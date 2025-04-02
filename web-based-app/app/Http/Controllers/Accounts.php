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
            'section' => 'nullable|string|max:255',
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'last_name' => 'sometimes|required|string|max:255',
            'first_name' => 'sometimes|required|string|max:255',
            'middle_name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'sometimes|required|string|max:255',
            'address' => 'sometimes|required|string|max:255',
            'section' => 'sometimes|nullable|string|max:255',
            'phone_number' => 'sometimes|required|string|max:15|unique:users,phone_number,' . $id,
            'relation' => 'sometimes|nullable|string|max:255',
            'password' => [
                'sometimes', 'nullable', 'string', 'min:8', 'confirmed',
                'regex:/[a-zA-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/'
            ],
        ]);

        try {
            $user = User::findOrFail($id);

            // Filter out only the fields that are present in the request
            $data = array_filter($request->only([
                'last_name', 'first_name', 'middle_name', 'email', 
                'role', 'address', 'phone_number', 'relation'
            ]));

            // Hash password if provided
            if ($request->filled('password')) {
                $data['password'] = bcrypt($request->password);
            }

            $user->update($data);

            return redirect()->back()->with('success', 'Account updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Unable to update account');
        }
    }
}
