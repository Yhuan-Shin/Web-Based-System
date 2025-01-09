<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BMI;
use Illuminate\Support\Facades\DB;

class Admin extends Controller
{
    //

    public function index()
    {
        $data = DB::table('bmi')
        ->select(
            DB::raw('result'),
            DB::raw('count(*) as total'))
            ->groupBy('result')
            ->get();
        
        $array[] = ['Result', 'Total'];
        foreach($data as $key => $value)
        {
            $array[++$key] = [$value->result, $value->total];
        }
        return view('admin.index',['result'=>json_encode($array)]);
    }
}
