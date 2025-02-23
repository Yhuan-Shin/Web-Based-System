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
                return redirect('/')->with('error', 'Please wait for the admin to confirm your account');
            }
        } else {
            return redirect('/')->with('error', 'Invalid credentials');
        }
        
    }
    
    public function register(Request $request)
    {
        $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15|unique:users',
            'relation' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed|regex:/[a-zA-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',

           'st_last_name.*' => 'required|string|max:255',
           'st_first_name.*' => 'required|string|max:255',
           'st_middle_name.*' => 'required|string|max:255',
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
        try {
            $user = User::create([
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'email' => $request->email,
                'role' => $request->role,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'relation' => $request->relation,
                'password' => Hash::make($request->password),
            ]);
            $students = $request->only(['st_last_name', 'st_first_name', 'st_middle_name', 'age', 'gender', 'birthday', 'section', 'student_no', 'grade']);
            foreach ($students['st_last_name'] as $index => $st_last_name) {
                Student::create([
                    'st_last_name' => $st_last_name,
                    'st_first_name' => $students['st_first_name'][$index],
                    'st_middle_name' => $students['st_middle_name'][$index],
                    'age' => $students['age'][$index],
                    'gender' => $students['gender'][$index],
                    'birthday' => $students['birthday'][$index],
                    'section' => $students['section'][$index],
                    'student_no' => $students['student_no'][$index],
                    'grade' => $students['grade'][$index],
                    'user_id' => $user->id
                ]);
            }
        } catch (\Exception $e) {
            return redirect('/register')->with('error', 'Registration failed: ' . $e->getMessage());
        }

       

        return redirect('/')->with('success', 'Registered successfully');
    }
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
