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
    public $student_no;
    public $st_last_name;
    public $st_first_name;
    public $st_middle_name;

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
    $student = StudentModel::where('st_last_name', $this->st_last_name)
        ->where('st_first_name', $this->st_first_name)
        ->where('st_middle_name', $this->st_middle_name)
        ->where('student_no', $this->student_no)
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
        // Ensure that this creates a completely new record
        $this->bmiRecord = BMI::create([
            'student_id' => $student->id,
            'weight' => $this->weight,
            'height' => $this->height,
            'bmi' => $this->bmi,
            'result' => $this->result,
            'st_last_name' => $student->st_last_name,
            'st_first_name' => $student->st_first_name,
            'st_middle_name' => $student->st_middle_name,
        ]);
    
        session()->flash('message', 'BMI has been calculated and saved successfully!');
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
        6 => [
            ['max' => 13.5, 'result' => "Severely Wasted"],
            ['max' => 13.8, 'result' => "Underweight"],
            ['max' => 17.5, 'result' => "Normal"],
            ['max' => 19.6, 'result' => "Overweight"],
            ['result' => "Obese"]
        ],
        7 => [
            ['max' => 13.8, 'result' => "Severely Wasted"],
            ['max' => 14.0, 'result' => "Underweight"],
            ['max' => 18.2, 'result' => "Normal"],
            ['max' => 20.4, 'result' => "Overweight"],
            ['result' => "Obese"]
        ],
        8 => [
            ['max' => 14.0, 'result' => "Severely Wasted"],
            ['max' => 14.5, 'result' => "Underweight"],
            ['max' => 19.0, 'result' => "Normal"],
            ['max' => 21.5, 'result' => "Overweight"],
            ['result' => "Obese"]
        ],
        9 => [
            ['max' => 14.5, 'result' => "Severely Wasted"],
            ['max' => 14.8, 'result' => "Underweight"],
            ['max' => 19.8, 'result' => "Normal"],
            ['max' => 22.5, 'result' => "Overweight"],
            ['result' => "Obese"]
        ],
        10 => [
            ['max' => 14.8, 'result' => "Severely Wasted"],
            ['max' => 15.3, 'result' => "Underweight"],
            ['max' => 20.7, 'result' => "Normal"],
            ['max' => 23.8, 'result' => "Overweight"],
            ['result' => "Obese"]
        ],
        11 => [
            ['max' => 15.3, 'result' => "Severely Wasted"],
            ['max' => 15.7, 'result' => "Underweight"],
            ['max' => 21.7, 'result' => "Normal"],
            ['max' => 25.0, 'result' => "Overweight"],
            ['result' => "Obese"]
        ],
        12 => [
            ['max' => 15.7, 'result' => "Severely Wasted"],
            ['max' => 16.2, 'result' => "Underweight"],
            ['max' => 22.7, 'result' => "Normal"],
            ['max' => 26.5, 'result' => "Overweight"],
            ['result' => "Obese"]
        ],
    ];

    // BMI category logic for females
    $femaleBMICategories = [
        5 => [
            ['max' => 13.0, 'result' => "Severely Wasted"],
            ['max' => 13.4, 'result' => "Underweight"],
            ['max' => 17.0, 'result' => "Normal"],
            ['max' => 18.8, 'result' => "Overweight"],
            ['result' => "Obese"]
        ],
        6 => [
            ['max' => 13.4, 'result' => "Severely Wasted"],
            ['max' => 13.6, 'result' => "Underweight"],
            ['max' => 17.4, 'result' => "Normal"],
            ['max' => 19.6, 'result' => "Overweight"],
            ['result' => "Obese"]
        ],
        7 => [
            ['max' => 13.6, 'result' => "Severely Wasted"],
            ['max' => 14.0, 'result' => "Underweight"],
            ['max' => 18.1, 'result' => "Normal"],
            ['max' => 20.3, 'result' => "Overweight"],
            ['result' => "Obese"]
        ],
        8 => [
            ['max' => 14.0, 'result' => "Severely Wasted"],
            ['max' => 14.5, 'result' => "Underweight"],
            ['max' => 19.0, 'result' => "Normal"],
            ['max' => 21.4, 'result' => "Overweight"],
            ['result' => "Obese"]
        ],
        9 => [
            ['max' => 14.5, 'result' => "Severely Wasted"],
            ['max' => 14.7, 'result' => "Underweight"],
            ['max' => 20.0, 'result' => "Normal"],
            ['max' => 22.6, 'result' => "Overweight"],
            ['result' => "Obese"]
        ],
        10 => [
            ['max' => 14.7, 'result' => "Severely Wasted"],
            ['max' => 15.2, 'result' => "Underweight"],
            ['max' => 21.1, 'result' => "Normal"],
            ['max' => 24.0, 'result' => "Overweight"],
            ['result' => "Obese"]
        ],
        11 => [
            ['max' => 15.3, 'result' => "Severely Wasted"],
            ['max' => 15.7, 'result' => "Underweight"],
            ['max' => 22.3, 'result' => "Normal"],
            ['max' => 25.5, 'result' => "Overweight"],
            ['result' => "Obese"]
        ],
        12 => [
            ['max' => 15.7, 'result' => "Severely Wasted"],
            ['max' => 16.2, 'result' => "Underweight"],
            ['max' => 23.5, 'result' => "Normal"],
            ['max' => 27.0, 'result' => "Overweight"],
            ['result' => "Obese"]
        ],
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
        
        return view('livewire.b-m-i-calculator');
    }
}
