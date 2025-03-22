<?php

namespace App\Livewire;

use Livewire\Component;

class BmiCalculatorTest extends Component
{
    public $weight;
    public $height;
    public $age;
    public $result;
    public $gender;
    public function render()
    {
        return view('livewire.bmi-calculator-test',['result' => $this->result]);    
    }
   
    public function calculate()
    {
        if ($this->weight <= 0 || $this->height <= 0) {
            session()->flash('error', 'Weight and height must be greater than zero.');
            return;
        }
    
        if ($this->age < 5 || $this->age > 12) {
            session()->flash('error', 'Age must be between 5 and 12.');
            return;
        }
    
        $heightInMeters = $this->height / 100;
        $bmi = $this->weight / ($heightInMeters * $heightInMeters);
    
        // Get BMI category
        $category = $this->getBmiCategory($bmi, $this->age, $this->gender);
    
        // Display the result
        $this->result = [
            'weight' => $this->weight,
            'height' => $this->height,
            'age' => $this->age,
            'bmi' => $bmi,
            'gender' => $this->gender,
            'category' => $category,
        ];
    
        session()->flash('message', 'BMI calculated successfully!');
    }
    
    private function getBmiCategory($bmi, $age, $gender)
    {
        $bmiCategories = [
            'male' => [
                5 => [13.0, 13.5, 13.8, 13.9, 14.5, 14.8, 15.3, 15.7], 
                6 => [13.5, 13.8, 14.3, 14.9, 15.3, 15.7, 16.2],
                7 => [13.8, 14.3, 14.6, 15.4, 15.9, 16.3],
                8 => [13.9, 14.3, 14.8, 15.4, 15.9, 16.3],
                9 => [14.5, 14.9, 15.4, 19.0, 19.1, 22.7],
                10 => [14.8, 15.3, 15.8, 21.7, 22.8, 25.1],
                11 => [15.3, 15.7, 16.2, 22.3, 23.6, 27.1],
                12 => [15.7, 16.2, 16.8, 23.6, 27.1, 30.0],
            ],
            'female' => [
                5 => [13.0, 13.4, 13.6, 17.1, 18.9],
                6 => [13.4, 13.6, 13.9, 17.5, 19.7],
                7 => [13.6, 14.0, 14.3, 18.2, 20.5],
                8 => [14.0, 14.5, 14.7, 19.0, 21.5],
                9 => [14.4, 15.0, 15.2, 20.1, 22.7],
                10 => [14.7, 15.2, 15.7, 21.1, 24.1],
                11 => [15.3, 15.7, 16.2, 21.4, 25.1],
                12 => [15.7, 16.2, 16.8, 23.6, 27.1],
            ],
        ];
    
        if (!isset($bmiCategories[$gender][$age])) {
            return 'Unknown';
        }
    
        $thresholds = $bmiCategories[$gender][$age];
    
        if ($bmi < $thresholds[0]) return 'Severely Wasted';
        if ($bmi < $thresholds[1]) return 'Underweight';
        if ($bmi < $thresholds[2]) return 'Normal';
        if ($bmi < $thresholds[3]) return 'Overweight';
    
        return 'Obese';
    }
    
    public function close()
    {
        $this->reset();
    }
    
}
