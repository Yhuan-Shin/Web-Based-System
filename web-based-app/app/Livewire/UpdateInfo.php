<?php

namespace App\Livewire;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UpdateInfo extends Component
{

    use WithFileUploads;
    public $st_last_name, $st_first_name, $st_middle_name, $age, $gender, $grade, $section, $birthday, $student_no, $profile_pic;
    public $studentId;

    
    public function updatedBirthday($value)
    {
        $this->age = round($this->calculateAge($value));
        if ($this->age <= 0) {
            $this->addError('age', 'The age cannot be zero or negative');
        } else {
            // Clear any previous error if the age is valid
            $this->resetErrorBag('age');
        }
    }
    private function calculateAge($dob)
    {
        $dob = \Carbon\Carbon::parse($dob);
        $today = \Carbon\Carbon::now();

        return $dob->diffInYears($today);
    }
    public function render()
    {   
        $students = Student::where('user_id', Auth::user()->id)->get();
        return view('livewire.update-info',['students' => $students]);
    }
    

}
