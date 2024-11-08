<?php

namespace App\Livewire;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayUsers extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        // Eager load the BMI relationship and select only the relevant columns
        $students = Student::with([
            'bmi:id,student_id,bmi,height,weight,result',
            'user:id,name,phone_number' // Use 'user' instead of 'users' to match the relationship name
        ])
        ->select('id', 'name', 'age', 'gender', 'user_id') // Include 'user_id' to link to User
        ->paginate(10);
          
        
        return view('livewire.display-users', ['students' => $students]);
    }
}
