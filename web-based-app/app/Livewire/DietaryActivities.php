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

    use WithPagination;
    public $filter;
    public $gradeFilter;
    public $search;

    public function render()
    {
        $query = Student::with([
            'bmi:id,student_id,bmi,height,weight,result',
            'user:id,last_name,first_name,phone_number'
        ])
       
        ->select('id', 'st_last_name', 'st_first_name', 'age', 'gender', 'user_id','grade','section','student_no');
        if ($this->search) {
            $query->where(function ($q) {
            $q->where('st_last_name', 'like', '%' . $this->search . '%')
              ->orWhere('st_first_name', 'like', '%' . $this->search . '%')
              ->orWhere('student_no', 'like', '%' . $this->search . '%')
              ->orWhere('grade', 'like', '%' . $this->search . '%')
              ->orWhere('section', 'like', '%' . $this->search . '%');
            });

            if ($query->count() == 0) {
            session()->flash('warning', 'No results found. Please enter again.');
            }
        }
        if ($this->gradeFilter) {
            switch($this->gradeFilter){
            case 'Kinder':
                $query->where('grade', 'Kinder');
                break;
            case 'Grade1':
                $query->where('grade', 'Grade1');
                break;
            case 'Grade2':
                $query->where('grade', 'Grade2');
                break;
            case 'Grade3':
                $query->where('grade', 'Grade3');
                break;
            case 'Grade4':
                $query->where('grade', 'Grade4');
                break;
            case 'Grade5':
                $query->where('grade', 'Grade5');
                break;
            case 'Grade6':
                $query->where('grade', 'Grade6');
                break;
            default:
                break;
            }

        }

        if ($this->filter) {
            switch($this->filter){
            case 'Severely Wasted':
                $query->whereHas('bmi', function ($q) {
                $q->where('result', 'Severely Wasted');
                });
                break;
            case 'Underweight':
                $query->whereHas('bmi', function ($q) {
                $q->where('result', 'Underweight');
                });
                break;
            case 'Normal':
                $query->whereHas('bmi', function ($q) {
                $q->where('result', 'Normal');
                });
                break;
            case 'Overweight':
                $query->whereHas('bmi', function ($q) {
                $q->where('result', 'Overweight');
                });
                break;

            case 'Obese':
                $query->whereHas('bmi', function ($q) {
                $q->where('result', 'Obese');
                });
                break;
            default:
                break;
            }
        }

        $students = $query->paginate(10);
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
