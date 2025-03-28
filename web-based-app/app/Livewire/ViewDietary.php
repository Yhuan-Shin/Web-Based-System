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
        // Get all students related to the logged-in user
        $students = Auth::user()->students; 

        // Get all dietary records linked to the retrieved students
        $dietaries = DietaryAndActivities::with('student')
            ->whereIn('student_id', $students->pluck('id')) // Extract student IDs
            ->where('created_at', '>=', now()->startOfWeek()) 
            ->latest()
            ->get();

        return view('livewire.view-dietary', compact('dietaries'));
    }
}