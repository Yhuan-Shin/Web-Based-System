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
                      ->where('student_id', Auth::user()->id)
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
    
    
}
