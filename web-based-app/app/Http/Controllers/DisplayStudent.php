<?php

namespace App\Http\Controllers;
use App\Models\Student as StudentModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DisplayStudent extends Controller
{
    /**
     * Show the admin student page.
     *
     * @return \Illuminate\Http\Response
     */
    //
    public function index(){
        $students = StudentModel::where('user_id', Auth::user()->id)->get();

        return view('admin.students', ['students' => $students]);
    }
}
