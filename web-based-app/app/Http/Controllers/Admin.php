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
        $month = $request->input('month', date('Y-m'));
    
        // Get BMI records for the selected month
        $records = BMI::where('created_at', 'like', $month . '%')->get();
    
        // Define BMI categories
        $categories = ['Severely Wasted', 'Underweight', 'Normal', 'Overweight', 'Obese'];
    
        // Count occurrences for each category
        $counts = [];
        foreach ($categories as $category) {
            $counts[] = $records->where('result', $category)->count();
        }
    
        // Prepare data for Chart.js
        $data = [
            'labels' => $categories, // X-axis labels
            'counts' => $counts // Y-axis values
        ];
    
        return view('admin.index', compact('data', 'month'));
    }
    
    
}
