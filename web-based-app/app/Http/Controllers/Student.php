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
        return view('user/index', ['students' => $students]);
    }
    
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string|max:255',
        ]);

        $name = $request->name;
        $age = $request->age;
        $gender = $request->gender;
        $user_id = Auth::user()->id;

        // Save the data to the database
        $student = new StudentModel();
        $student->name = $name;
        $student->age = $age;
        $student->gender = $gender;
        $student->user_id = $user_id;
        $student->save();

        return redirect('/dashboard')->with(['students' => $student, 'success' => 'Information has been saved']);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string|max:255',
        ]);

        $name = $request->name;
        $age = $request->age;
        $gender = $request->gender;
        $user_id = Auth::user()->id;

        // Save the data to the database
        $student = StudentModel::find($id);
        $student->name = $name;
        $student->age = $age;
        $student->gender = $gender;
        $student->user_id = $user_id;
        $student->save();

        return redirect('/dashboard')->with(['students' => $student, 'success' => 'Information has been updated']);
    }

    public function destroy($id)
    {
        BMI::where('student_id', $id)->delete();
        StudentModel::destroy($id);
        return redirect('/dashboard')->with(['success' => 'Information has been deleted']);
    }
}
