<?php

namespace App\Livewire;
use App\Models\Student;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayUsers extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        
        $students = Student::with([
            'bmi:id,student_id,bmi,height,weight,result',
            'user:id,name,phone_number'
        ])
       
        ->select('id', 'student_name', 'age', 'gender', 'user_id','student_no','grade','section')
        ->paginate(10);
    
          
        
        return view('livewire.display-users', ['students' => $students]);
    }
}
