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
    // public function edit($id)
    // {
    //     $student = Student::find($id);
    //     $this->st_last_name = $student->st_last_name;
    //     $this->st_first_name = $student->st_first_name;
    //     $this->st_middle_name = $student->st_middle_name;
    //     $this->age = $student->age;
    //     $this->gender = $student->gender;
    //     $this->birthday = $student->birthday;
    //     $this->student_no = $student->student_no;
    //     $this->profile_pic = $student->profile_pic;
    //     $this->grade = $student->grade;
    //     $this->section = $student->section;
    // }
    // public function update()
    // {
    //     $this->validate([
    //         'st_last_name' => 'nullable|string|max:255',
    //         'st_first_name' => 'nullable|string|max:255',
    //         'st_middle_name' => 'nullable|string|max:255',
    //         'grade' => 'nullable|string|max:255',
    //         'section' => 'nullable|string|max:255',
    //         'age' => 'nullable|integer',
    //         'gender' => 'nullable|string|max:255',
    //         'birthday' => 'nullable|date',
    //         'student_no' => 'nullable|string',
    //         'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

    //     ]);

    //     $student = Student::find($this->studentId);
    //     $student->st_last_name = $this->st_last_name;
    //     $student->st_first_name = $this->st_first_name;
    //     $student->st_middle_name = $this->st_middle_name;
    //     $student->grade = $this->grade;
    //     $student->section = $this->section;
    //     $student->age = $this->age;
    //     $student->gender = $this->gender;
    //     $student->birthday = $this->birthday;
    //     $student->student_no = $this->student_no;
    //     if ($this->profile_pic) {
    //         // Delete the current profile picture if it exists
    //         if ($student->profile_pic && Storage::exists($student->profile_pic)) {
    //         Storage::delete($student->profile_pic);
    //         }
    //         // Store the new profile picture
    //         $student->profile_pic = $this->profile_pic->store('public/profile_pics');
    //     }
    //     $student->save();

    //     session()->flash('message', 'Student information updated successfully');
    // }

}
