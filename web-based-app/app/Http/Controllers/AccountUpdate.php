<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Auth;
class AccountUpdate extends Controller
{
    //
    public function update(Request $request, $id)
{
    $user = User::findOrFail(Auth::user()->id); // Ensure user exists

    // Dynamically validate only the fields that are provided
    $request->validate([
        'last_name' => 'sometimes|string|max:255',
        'first_name' => 'sometimes|string|max:255',
        'middle_name' => 'sometimes|string|max:255',
        'email' => 'sometimes|string|email|max:255|unique:users,email,' . $user->id,
        'address' => 'sometimes|string|max:255',
        'phone_number' => 'sometimes|string|max:15|unique:users,phone_number,' . $user->id,
        'password' => [
            'sometimes', 'nullable', 'string', 'min:8', 'confirmed',
            'regex:/[a-zA-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/'
        ],
    ], [
        'password.regex' => 'Password must contain at least one letter, one number, and one special character.'
    ]);

    try {
        // Update only the fields that are present in the request
        if ($request->filled('last_name')) {
            $user->last_name = $request->last_name;
        }
        if ($request->filled('first_name')) {
            $user->first_name = $request->first_name;
        }
        if ($request->filled('middle_name')) {
            $user->middle_name = $request->middle_name;
        }
        if ($request->filled('email')) {
            $user->email = $request->email;
        }
        if ($request->filled('address')) {
            $user->address = $request->address;
        }
        if ($request->filled('phone_number')) {
            $user->phone_number = $request->phone_number;
        }
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect('/account')->with('success', 'Account has been updated successfully.');
    } catch (Exception $e) {
        // Log the error for debugging purposes

        return redirect('/account')->with('error', 'Failed to update account. Please try again.');
    }
}
    
   
    public function view(){
        $user = User::find(Auth::user()->id);
        $students = Student::where('user_id', Auth::user()->id)->get();
        return view('user/account-update', ['students' => $students], ['user' => $user]);
    }
}
