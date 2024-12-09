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

        if($birthday >= date('Y-m-d') || $birthday == date('Y-m-d') && $age <= 0) {
            return redirect('/home')->with(['error' => 'Birthdate cannot be greater than or equal today']);
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
        ]);

        $student_name = $request->student_name;
        $age = $request->age;
        $gender = $request->gender;
        $user_id = Auth::user()->id;
        $grade = $request->grade;
        $section = $request->section;
        
        // Save the data to the database
        $student = StudentModel::find($id);
        $student->student_name = $student_name;
        $student->age = $age;
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
