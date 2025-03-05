<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\BMI;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Student as StudentModel;
use Illuminate\Http\Request;

class Student extends Controller
{
    //
    public function index(Request $request)
    {
        $year = $request->input('year', date('Y'));
        $month = $request->input('month', date('m')); // Use 'm' for two-digit format
    
        // Get BMI records for the selected month and year
        $records = BMI::whereYear('created_at', $year)
                      ->whereMonth('created_at', $month)
                      ->get();
    
        // Define BMI categories
        $categories = ['Severely Wasted', 'Underweight', 'Normal', 'Overweight', 'Obese'];
    
        // Count occurrences for each category
        $counts = [];
        foreach ($categories as $category) {
            $counts[] = $records->where('result', $category)->count();
        }
    
        // Prepare data for Chart.js
        $data = [
            'labels' => $categories,
            'counts' => $counts
        ];
        $students = StudentModel::where('user_id', Auth::user()->id)->get();
        
        return view('user.index',compact('students', 'year', 'month','data'));
    }
    
    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'st_last_name' => 'required|string|max:255',
            'st_first_name' => 'required|string|max:255',
            'st_middle_name' => 'required|string|max:255',
            'grade' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string|max:255',
            'birthday' => 'required|date',
            'student_no' => 'required|string',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
        $st_last_name = $request->st_last_name;
        $st_first_name = $request->st_first_name;
        $st_middle_name = $request->st_middle_name;
        $student_no = $request->student_no;
        $birthday = $request->birthday;
        $age = $request->age;
        $gender = $request->gender;
        $user_id = Auth::user()->id;
        $grade = $request->grade;
        $section = $request->section;
    
        // Check if age is valid
        if ($age > 12 || $age < 5) { 
            return redirect('/home')->with(['error' => 'Age must be between 5 and 12']);
        }
    
        try {
            // Retrieve the student record by ID
            $student = StudentModel::find($id);
    
            if (!$student) {
                return redirect('/home')->with(['error' => 'Student not found']);
            }
    
            // Update student details
            $student->st_last_name = $st_last_name;
            $student->st_first_name = $st_first_name;
            $student->st_middle_name = $st_middle_name;
            $student->age = $age;
            $student->student_no = $student_no;
            $student->birthday = $birthday;
            $student->grade = $grade;
            $student->section = $section;
            $student->gender = $gender;
            $student->user_id = $user_id;

    
            // Check if the profile picture is uploaded
        if ($request->hasFile('profile_pic')) {
            // Store new profile picture
            $profile_pic = $request->file('profile_pic')->store('uploaded_profile_pics', 'public');
            // Delete old profile picture if exists
            if ($student->profile_pic && Storage::exists('public/' . $student->profile_pic)) {
                Storage::delete('public/' . $student->profile_pic);
            }
            $student->profile_pic = $profile_pic;
        }

        // Save the updated student information
        $student->save();
    
        } catch (\Exception $e) {
            return redirect('/home')->with(['error' => 'Failed to update information: ' . $e->getMessage()]);
        }
    
        return redirect('/home')->with(['students' => $student, 'success' => 'Information has been updated']);
    }
    

    public function destroy($id)
    {
        BMI::where('student_id', $id)->delete();
        StudentModel::destroy($id);
        return redirect('/home')->with(['success' => 'Information has been deleted']);
    }
}
