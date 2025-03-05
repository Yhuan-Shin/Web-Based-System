<?php

namespace App\Livewire;
use App\Models\Student;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayStudents extends Component
{
    use WithPagination;
    public $filter;
    public $gradeFilter;
    public $search;
    public $birthday;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $query = Student::with([
            'bmi:id,student_id,bmi,height,weight,result',
            'user:id,last_name,first_name,phone_number'
        ])
        ->select('id', 'st_last_name', 'st_first_name','st_middle_name', 'age', 'gender', 'user_id','student_no','grade','section','profile_pic');

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
                $query->where('grade', 'Grade 1');
                break;
            case 'Grade2':
                $query->where('grade', 'Grade 2');
                break;
            case 'Grade3':
                $query->where('grade', 'Grade 3');
                break;
            case 'Grade4':
                $query->where('grade', 'Grade 4');
                break;
            case 'Grade5':
                $query->where('grade', 'Grade 5');
                break;
            case 'Grade6':
                $query->where('grade', 'Grade 6');
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

        
        return view('livewire.display-students', ['students' => $students]);
    }
}
