<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\BMI;
use Illuminate\Support\Facades\Auth;
use App\Models\Student as StudentModel;
use Illuminate\Http\Request;

class Student extends Controller
{
    //
    public function index()
    {
        $students = StudentModel::where('user_id', Auth::user()->id)->get();
        return view('user.index', ['students' => $students]);
    }
    
    public function submit(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string|max:255',
            'grade' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'birthday' => 'required|date',
            'student_no' => 'required|string',
        ]);

        $student_name = $request->student_name;
        $age = $request->age;
        $gender = $request->gender;
        $birthday = $request->birthday;
        $student_no = $request->student_no;
        $grade = $request->grade;
        $section = $request->section;
        $user_id = Auth::user()->id;

        if($age > 12 || $age < 5){ 
            return redirect('/home')->with(['error' => 'Age must be between 5 and 12']);
        }
        // Save the data to the database
        $student = new StudentModel();
        $student->student_name = $student_name;
        $student->age = $age;
        $student->gender = $gender;
        $student->user_id = $user_id;
        $student->grade = $grade;
        $student->section = $section;
        $student->birthday = $birthday;
        $student->student_no = $student_no;
        $student->save();

        return redirect('/home')->with(['students' => $student, 'success' => 'Information has been saved']);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'grade' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string|max:255',
            'birthday' => 'required|date',
            'student_no' => 'required|string',

        ]);

        $student_name = $request->student_name;
        $student_no = $request->student_no;
        $birthday = $request->birthday;
        $age = $request->age;
        $gender = $request->gender;
        $user_id = Auth::user()->id;
        $grade = $request->grade;
        $section = $request->section;
        if($age > 12 || $age < 5){ 
            return redirect('/home')->with(['error' => 'Age must be between 5 and 12']);
        }
        // Save the data to the database
        $student = StudentModel::find($id);
        $student->student_name = $student_name;
        $student->age = $age;
        $student->student_no = $student_no;
        $student->birthday = $birthday;
        $student->grade = $grade;
        $student->section = $section;
        $student->gender = $gender;
        $student->user_id = $user_id;
        $student->save();

        return redirect('/home')->with(['students' => $student, 'success' => 'Information has been updated']);
    }

    public function destroy($id)
    {
        BMI::where('student_id', $id)->delete();
        StudentModel::destroy($id);
        return redirect('/home')->with(['success' => 'Information has been deleted']);
    }
}
