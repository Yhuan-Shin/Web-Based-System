<?php

namespace App\Http\Controllers;
use App\Models\User;
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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        // Attempt to log the user in
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (User::where('confirmed', 1)->first()) {
                $request->session()->regenerate(); // Prevents session fixation
                return redirect('/home');
            } else {
                return redirect('/login')->with('error', 'Please wait for the admin to confirm your account');
            }
        } else {
            return redirect('/login')->with('error', 'Invalid credentials');
        }
        
    
        // If authentication fails, redirect back with an error message
        return redirect('/login')->with('error', 'Invalid credentials');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15|unique:users',
            'relation' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed|regex:/[a-zA-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',

           'student_name.*' => 'required|string|max:255',
            'gender.*' => 'required|string|max:255',
            'age.*' => 'required|integer|between:5,12',
            'grade.*' => 'required|string|max:255',
            'section.*' => 'required|string|max:255',
            'birthday.*' => 'required|date',
            'student_no.*' => [
                'required',
                'string',
                'max:255',
                Rule::unique('student', 'student_no'),
            ],
        ],
        [
            'password.regex' => 'Password must contain at least one letter, one number, and one special character'
        ]);
        foreach ($request->age as $age) {
            if ($age < 5 || $age > 12) {
            return redirect('/register')->with('error', 'Age must be between 5 to 12');
            }
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'relation' => $request->relation,
            'password' => Hash::make($request->password),
        ]);
        $students = $request->only(['student_name', 'age', 'gender', 'birthday', 'section', 'student_no', 'grade']);
        foreach ($students['student_name'] as $index => $student_name) {
            Student::create([
            'student_name' => $student_name,
            'age' => $students['age'][$index],
            'gender' => $students['gender'][$index],
            'birthday' => $students['birthday'][$index],
            'section' => $students['section'][$index],
            'student_no' => $students['student_no'][$index],
            'grade' => $students['grade'][$index],
            'user_id' => $user->id
            ]);
        }

       

        return redirect('/login')->with('success', 'Registered successfully');
    }
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
