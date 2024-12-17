<?php

namespace App\Livewire;
use Livewire\WithPagination;
use App\Models\DietaryAndActivities;
use Livewire\Component;
use App\Models\Student;
class DietaryActivities extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $dietary;
    public $activities;
    public $selectedStudentId;

    public function render()
    {
        $students = Student::with([
            'bmi:id,student_id,bmi,height,weight,result',
            'user:id,name,phone_number'
        ])
       
        ->select('id', 'student_name', 'age', 'gender', 'user_id','grade','section','student_no')
        ->paginate(10);
        return view('livewire.dietary-activities', ['students' => $students]);
    }
    protected $rules = [
        'dietary' => 'required|string|max:500',
        'activities' => 'required|string|max:500',
    ];

    public function selectStudent($id)
    {
        $this->selectedStudentId = $id;
    }

    public function save()
    {
        $this->validate();

        $student = Student::findOrFail($this->selectedStudentId);

        $student->dietaryAndActivities()->create([
            'dietary' => $this->dietary,
            'activities' => $this->activities,
        ]);

        session()->flash('message', 'Diet plan and activities saved successfully!');

        // Reset inputs and modal state
        $this->reset(['dietary', 'activities', 'selectedStudentId']);
    }
}
