<?php

namespace App\Livewire;
use Livewire\WithPagination;

use Livewire\Component;
use App\Models\Student;
class DietaryActivities extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $students = Student::with([
            'bmi:id,student_id,bmi,height,weight,result',
            'user:id,name,phone_number'
        ])
       
        ->select('id', 'student_name', 'age', 'gender', 'user_id')
        ->paginate(10);
        return view('livewire.dietary-activities', ['students' => $students]);
    }
}
