<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BMI;
use Illuminate\Support\Facades\DB;

class Admin extends Controller
{
  

    //chart
    public function index(Request $request)
{
    $year = $request->input('year', date('Y'));
    $month = $request->input('month', date('m'));

    // Get distinct records for each student_id (ignore duplicates)
    $records = BMI::whereYear('created_at', $year)
                  ->whereMonth('created_at', $month)
                  ->distinct('student_id')  // Ensure only unique student_id is selected
                  ->select('student_id', 'result')
                  ->get();

    // Define BMI categories
    $categories = ['Severely Wasted', 'Underweight', 'Normal', 'Overweight', 'Obese'];

    // Count occurrences for each category
    $counts = array_fill_keys($categories, 0);

    foreach ($records as $record) {
        // Increment the count for the specific BMI category for that student
        $counts[$record->result]++;
    }

    // Prepare data for Chart.js
    $data = [
        'labels' => $categories,
        'counts' => array_values($counts)  // Get the values for the chart
    ];

    return view('admin.index', compact('data', 'year', 'month'));
}

    
    
    
}
