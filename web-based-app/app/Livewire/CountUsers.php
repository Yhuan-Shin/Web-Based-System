<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class CountUsers extends Component
{
    public function render()
    {
        $users = User::all();
        return view('livewire.count-users',['users' => $users]);
    }
}
