<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\BMI;
use App\Models\Student as StudentModel;
use Illuminate\Http\Request;

class AdminStudentUpdate extends Controller
{
    //
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string|max:255',
        ]);

    
        return redirect('/admin/student')->with(['success' => 'Information has been updated']);
    }
}
