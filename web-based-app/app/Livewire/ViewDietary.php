<?php

namespace App\Livewire;
use App\Models\DietaryAndActivities;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewDietary extends Component
{
    public function render()
    {
        $student = Student::where('user_id', Auth::user()->id)->first();
        if ($student) {
            
            $dietaries = DietaryAndActivities::with('student')->where('student_id', $student->id)->get();
        }
        return view('livewire.view-dietary', ['dietaries' => $dietaries]);
    }
}
