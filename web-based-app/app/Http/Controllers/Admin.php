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
    
        return view('admin.index', compact('data', 'year', 'month'));
    }
    
    
    
}
