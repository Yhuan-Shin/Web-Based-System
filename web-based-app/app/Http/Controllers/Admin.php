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

        $records = BMI::whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)
                    ->distinct('student_id')  
                    ->select('student_id', 'result')
                    ->get();

        $categories = ['Severely Wasted', 'Underweight', 'Normal', 'Overweight', 'Obese'];

        $counts = array_fill_keys($categories, 0);

        foreach ($records as $record) {
            $counts[$record->result]++;
        }

        $data = [
            'labels' => $categories,
            'counts' => array_values($counts)  
        ];

        return view('admin.index', compact('data', 'year', 'month'));
    }

    
    
    
}
