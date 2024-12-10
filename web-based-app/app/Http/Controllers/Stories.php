<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Stories extends Controller
{
    //
    public function index()
    {
        return view('admin.stories');
    }
}
