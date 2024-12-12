<?php

namespace App\Livewire;

use App\Http\Controllers\Student;
use App\Models\BMI;
use App\Models\Student as StudentModel;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class BMICalculator extends Component
{
    public $weight;
    public $height;
    public $student_name;
    public $bmi;
    public $result;
    public $id;
    
    public $bmiRecord;
    public function close()
    {
        $this->reset();

    }
    public function calculate()
{
    // Validate input first
    if ($this->weight <= 0 || $this->height <= 0) {
        session()->flash('error', 'Weight and height must be greater than zero.');
        return;
    }

    // Find the student
    $student = StudentModel::where('student_name', $this->student_name)
        ->where('user_id', Auth::user()->id)
        ->first();

    if (!$student) {
        session()->flash('error', 'Student not found.');
        return;
    }

    // Calculate BMI
    $heightInMeters = $this->height / 100;
    $this->bmi = round($this->weight / ($heightInMeters * $heightInMeters), 2);

    // Extract student details
    $gender = $student->gender;
    $age = $student->age;

    // Determine BMI result based on gender and age
    $this->result = $this->determineBMICategory($this->bmi, $gender, $age);

    // Save or update BMI record
    try {
        $this->bmiRecord = BMI::firstOrNew(['student_id' => $student->id]);
        
        $this->bmiRecord->weight = $this->weight;
        $this->bmiRecord->height = $this->height;
        $this->bmiRecord->bmi = $this->bmi;
        $this->bmiRecord->result = $this->result;
        $this->bmiRecord->name = $student->student_name;
        
        $this->bmiRecord->save();

        $message = $this->bmiRecord->wasRecentlyCreated 
            ? 'BMI has been calculated successfully!' 
            : 'BMI has been updated successfully!';
        
        session()->flash('message', $message);
    } catch (\Exception $e) {
        session()->flash('error', 'Failed to save BMI record: ' . $e->getMessage());
    }
}

private function determineBMICategory($bmi, $gender, $age)
{
    // BMI category logic for males
    $maleBMICategories = [
        5 => [
            ['max' => 13.0, 'result' => "Severely Wasted"],
            ['max' => 13.5, 'result' => "Underweight"],
            ['max' => 17.0, 'result' => "Normal"],
            ['max' => 18.8, 'result' => "Overweight"],
            ['result' => "Obese"]
        ],
        // Add other ages for males similarly...
    ];

    // BMI category logic for females
    $femaleBMICategories = [
        5 => [
            ['max' => 13.0, 'result' => "Severely Wasted"],
            ['max' => 13.4, 'result' => "Underweight"],
            ['max' => 17.0, 'result' => "Healthy Weight"],
            ['max' => 18.8, 'result' => "Overweight"],
            ['result' => "Obese"]
        ],
        // Add other ages for females similarly...
    ];

    // Select the appropriate category array
    $categories = $gender == 'male' ? $maleBMICategories : $femaleBMICategories;

    // If age-specific categories are not defined, you might want to add a default or throw an exception
    if (!isset($categories[$age])) {
        return "Unknown Category";
    }

    // Determine the category
    foreach ($categories[$age] as $category) {
        if (!isset($category['max']) || $bmi < $category['max']) {
            return $category['result'];
        }
    }

    return "Unknown Category";
}
    
    public function render()
    {
        
        return view('livewire.b-m-i-calculator',[
            'bmiRecord' => $this->bmiRecord,]);
    }
}
