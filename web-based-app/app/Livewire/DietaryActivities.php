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
        $query = DietaryAndActivities::with([
            'student'=> function($q){
                $q->select('id', 'st_first_name', 'st_last_name','student_no', 'grade', 'section','age', 'gender');
            }
        ]);
        if ($this->search) {
            $query->whereHas('student', function ($q) {
                $q->where('st_first_name', 'like', '%'.$this->search.'%')
                    ->orWhere('st_last_name', 'like', '%'.$this->search.'%')
                    ->orWhere('student_no', 'like', '%'.$this->search.'%');
            });
            if ($query->count() == 0) {
                session()->flash('warning', 'No results found. Please enter again.');
            }
            
        }
      
        
        if ($this->gradeFilter) {
                $query->whereHas('student', function ($q) {
                    $q->where('grade', $this->gradeFilter);
                });
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
