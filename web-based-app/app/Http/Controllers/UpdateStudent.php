<?php

namespace App\Http\Controllers;
use App\Models\Student as StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\DietaryAndActivities;
use App\Models\BMI; // Ensure the BMI model is imported

class UpdateStudent extends Controller
{
    //
    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'st_last_name' => 'required|string|max:255',
            'st_first_name' => 'required|string|max:255',
            'st_middle_name' => 'required|string|max:255',
            'grade' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'allergies' => 'nullable|string|max:255',
            'health_conditions' => 'nullable|string|max:255',
            'section' => 'required|string|max:255',
            'age' => 'integer',
            'gender' => 'string|max:255',
            'birthday' => 'nullable|date',
            'student_no' => 'required|string|unique:student,student_no,' . $id,
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
        $st_last_name = $request->st_last_name;
        $st_first_name = $request->st_first_name;
        $st_middle_name = $request->st_middle_name;
        $student_no = $request->student_no;
        $birthday = $request->birthday;
        $age = $request->age;
        $gender = $request->gender;
        $grade = $request->grade;
        $section = $request->section;
        $religion = $request->religion;
        $allergies = $request->allergies;
        $health_conditions = $request->health_conditions;

    
        // Check if age is valid
        if ($age > 12 || $age < 5) { 
            return redirect()->back()->with(['error' => 'Age must be between 5 and 12']);
        }
    
        try {
            // Retrieve the student record by ID
            $student = StudentModel::find($id);
    
            if (!$student) {
                return redirect()->back()->with(['error' => 'Student not found']);
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
            $student->religion = $religion;
            $student->allergies = $allergies;
            $student->health_conditions = $health_conditions;

    
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
            return redirect()->back()->with(['error' => 'Failed to update information: ' . $e->getMessage()]);
        }
    
        return redirect()->back()->with(['students' => $student, 'success' => 'Information has been updated']);
    }
    public function destroy($id)
    {
        try {
            BMI::where('student_id', $id)->delete();
            DietaryAndActivities::where('student_id', $id)->delete();
            $student = StudentModel::find($id);
            
    
            if (!$student) {
                return redirect()->back()->with(['error' => 'Student not found']);
            }
    
            // Delete the profile picture if exists
            if ($student->profile_pic && Storage::exists('public/' . $student->profile_pic)) {
                Storage::delete('public/' . $student->profile_pic);
            }
    
            // Delete the student record
            $student->delete();
    
            return redirect()->back()->with(['success' => 'Student has been deleted']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Failed to delete student: ' . $e->getMessage()]);
        }
    }
}
