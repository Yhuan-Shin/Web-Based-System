<?php

namespace App\Livewire;
use Livewire\WithPagination;
use App\Models\DietaryAndActivities;
use Livewire\Component;
use App\Models\Student;
use Livewire\WithFileUploads;
use App\Models\BMI;

class DietaryActivities extends Component
{
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $dietary;
    public $activities;
    public $category;
    public $studentIds = [];

    use WithPagination;
    public $filter;
    public $gradeFilter;
    public $search;

    public function render()
    {
        $query = Student::with([
            'bmi' => function ($q) {
                $q->select('id', 'student_id', 'bmi', 'height', 'weight', 'result')
                  ->latest('created_at')
                  ->limit(1); // Get only the latest BMI record
            },
            'user:id,last_name,first_name,phone_number'
        ])
        ->select('id', 'st_last_name', 'st_first_name', 'st_middle_name', 'age', 'gender', 'user_id', 'student_no', 'grade', 'section', 'profile_pic');
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
        'category' => 'required',
     ];

   
     public function updatedCategory()
     {
         if ($this->category) {
             $this->studentIds = BMI::where('result', $this->category)
                 ->pluck('student_id')
                 ->toArray();
         }
     }
     
     public function save()
     {
         $this->validate();
 
         if (empty($this->studentIds)) {
             session()->flash('error', 'No students found in this category.');
             return;
         }
 
         try {
             foreach ($this->studentIds as $studentId) {
                 DietaryAndActivities::updateOrCreate(
                     ['student_id' => $studentId, 'category' => $this->category],
                     ['dietary' => $this->dietary, 'activities' => $this->activities]
                 );
             }
 
             session()->flash('success', 'Meal Plan and Activities successfully sent!');
             $this->reset(['dietary', 'activities', 'category', 'studentIds']);
 
         } catch (\Exception $e) {
             session()->flash('error', 'An error occurred: ' . $e->getMessage());
         }
     }
     
}
