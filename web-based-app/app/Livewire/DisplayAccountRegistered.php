<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;

class DisplayAccountRegistered extends Component
{
    public function render()
    {
        $account = User::all();
        return view('livewire.display-account-registered', ['accounts' => $account]);
    }
}
