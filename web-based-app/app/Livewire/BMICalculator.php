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
    public $name;
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
        // Ensure weight and height are set and greater than zero
        if ($this->weight > 0 && $this->height > 0) {
            // Convert height from cm to meters
            $heightInMeters = $this->height / 100;
    
            // Calculate BMI
            $this->bmi = $this->weight / ($heightInMeters * $heightInMeters);
            
            // Round to 2 decimal places
            $this->bmi = round($this->bmi, 2);
            
            // Determine BMI category based on calculated BMI value
            if ($this->bmi < 18.5) {
                $this->result = "Underweight";
            } elseif ($this->bmi >= 18.5 && $this->bmi <= 24.9) {
                $this->result = "Normal";
            } elseif ($this->bmi >= 25 && $this->bmi <= 29.9) {
                $this->result = "Overweight";
            } else {
                $this->result = "Obese";
            }
    
            // Check if a BMI record already exists for the given name
            $this->bmiRecord = StudentModel::where('name', $this->name)
            ->where('user_id', Auth::user()->id)
            ->first();

            if ($this->bmiRecord) {
                // Retrieve the existing BMI record or create a new instance tied to the student ID
                $bmiRecord = BMI::firstOrNew(['student_id' => $this->bmiRecord->id]);
                
                // Set the BMI fields, whether updating or creating
                $bmiRecord->weight = $this->weight;
                $bmiRecord->height = $this->height;
                $bmiRecord->bmi = $this->bmi;
                $bmiRecord->result = $this->result;
                
                if (!$bmiRecord->exists) {
                    // If it's a new record, set the name for the BMI and save as a new entry
                    $bmiRecord->name = $this->bmiRecord->name;
                    $message = 'BMI has been calculated successfully!';
                } else {
                    $message = 'BMI has been updated successfully!';
                }
            
                $bmiRecord->save();
                session()->flash('message', $message);
            
            } else {
                // Create a new student and a new BMI record for them
                $student = StudentModel::create([
                    'name' => $this->name,
                    'user_id' => Auth::user()->id
                ]);
            
                BMI::create([
                    'weight' => $this->weight,
                    'height' => $this->height,
                    'bmi' => $this->bmi,
                    'result' => $this->result,
                    'name' => $this->name,
                    'student_id' => $student->id
                ]);
            
                session()->flash('message', 'BMI has been calculated successfully!');
            }
            
            // Flash success message
        } else {
            // Flash an error message if weight or height is invalid
            session()->flash('error', 'Weight and height must be greater than zero.');
        }
    }
    
    public function render()
    {
        return view('livewire.b-m-i-calculator');
    }
}
