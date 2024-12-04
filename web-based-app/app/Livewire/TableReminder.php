<?php

namespace App\Livewire;
use App\Models\Reminder;
use Livewire\Component;
use App\Models\User;

class TableReminder extends Component
{
    public function render()
    {
        $users = User::all();
        $reminders = Reminder::all();
        return view('livewire.table-reminder',['reminders' => $reminders],['users' => $users]);
    }
}
