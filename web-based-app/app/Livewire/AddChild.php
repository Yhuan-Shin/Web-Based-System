<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
class AddChild extends Component
{
    use WithFileUploads;

    public $st_last_name, $st_first_name, $st_middle_name, $age, $gender, $grade, $section, $birthday, $student_no, $profile_pic;

    
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
        return view('livewire.add-child');
    }
    public function store()
    {
        $this->validate([
            'birthday' => 'required|date',
            'age' => 'required|integer|between:5,12',
            'gender' => 'required',
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'student_no' => 'required|unique:student,student_no',
            'st_first_name' => 'required',
            'st_last_name' => 'required',
            'st_middle_name' => 'required',
            'grade' => 'required',
            'section' => 'required',
            
        ]);
        $image_path = $this->profile_pic->store('uploaded_profile_pics', 'public');

        try {
            Student::create([   
                'user_id' => Auth::user()->id,
                'birthday' => $this->birthday,
                'age' => $this->age,
                'gender' => $this->gender,
                'profile_pic' => $image_path,
                'student_no' => $this->student_no,
                'st_first_name' => $this->st_first_name,
                'st_last_name' => $this->st_last_name,
                'st_middle_name' => $this->st_middle_name,
                'grade' => $this->grade,
                'section' => $this->section,
            ]);
        } catch (\Exception $e) {
            session()->flash('error', 'There was an error adding the student: ' . $e->getMessage());
        }
        session()->flash('success', 'Student added successfully.');
        $this->reset();
    }
}
