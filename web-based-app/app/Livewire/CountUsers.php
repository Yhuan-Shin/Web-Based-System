<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Student;

class CountUsers extends Component
{
    public function render()
    {
        $users = Student::all();
        return view('livewire.count-users',['users' => $users]);
    }
}
