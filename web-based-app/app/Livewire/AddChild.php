<?php

namespace App\Livewire;

use Livewire\Component;

class AddChild extends Component
{
    public $birthday;
    public $age;
    
    
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
}
