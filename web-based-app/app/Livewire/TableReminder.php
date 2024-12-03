<?php

namespace App\Livewire;
use App\Models\Reminder;
use Livewire\Component;

class TableReminder extends Component
{
    public function render()
    {
        $reminders = Reminder::all();
        return view('livewire.table-reminder',['reminders' => $reminders]);
    }
}
