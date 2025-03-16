<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountList extends Controller
{
    //
    public function index(){
        return view('admin.accounts');
    }
}
