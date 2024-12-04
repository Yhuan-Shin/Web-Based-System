<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Schedule extends Controller
{
    //
    public function index(){
        $students = Student::where('user_id', Auth::user()->id)->get();
        return view('user.schedule-page', ['students' => $students]);
    }
}
