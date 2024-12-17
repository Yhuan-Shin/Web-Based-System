<?php

namespace App\Http\Controllers;
use App\Models\Student as StudentModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DietaryDisplay extends Controller
{
    //
    public function index()
    {
        $students = StudentModel::where('user_id', Auth::user()->id)->get();

        return view('user.dietary', ['students' => $students]);
    }
}
