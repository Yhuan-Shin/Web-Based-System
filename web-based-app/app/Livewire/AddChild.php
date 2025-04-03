<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AddChild extends Component
{
    use WithFileUploads;

    public $st_last_name, $st_first_name, $st_middle_name, $age, $gender, $grade, $section, $birthday, $student_no, $profile_pic, $parent;

    
    public function updatedBirthday($value)
    {
        $this->age = round($this->calculateAge($value));
        if ($this->age <= 0) {
            $this->addError('age', 'The age cannot be zero or negative');
        } else {
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
        $parents = User::where('role', 'parent')->get();
        return view('livewire.add-child', compact('parents'));
    }
    public function store()
    {
        $this->validate([
            'birthday' => 'required|date',
            'age' => 'required|integer|between:5,12',
            'gender' => 'required',
            'profile_pic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'student_no' => 'required|unique:student,student_no|numeric',
            'st_first_name' => 'required',
            'st_last_name' => 'required',
            'st_middle_name' => 'required',
            'grade' => 'required',
            'section' => 'required',
            'parent' => 'required',
            'religion' => 'required|string|max:255',
            'allergies' => 'nullable|string|max:255',
            'health_conditions' => 'nullable|string|max:255',
            
        ]);
        $image_path = $this->profile_pic->store('uploaded_profile_pics', 'public');

        try {
            Student::create([   
                'user_id' => $this->parent,
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
                'religion' => $this->religion,
                'allergies' => $this->allergies,
                'health_conditions' => $this->health_conditions,
            ]);
            
        } catch (\Exception $e) {
            session()->flash('error', 'There was an error adding the student: ' . $e->getMessage());
        }
        session()->flash('success', 'Student added successfully.');
        $this->reset();
    }
}
