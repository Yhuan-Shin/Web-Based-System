<?php

namespace App\Livewire;
use App\Models\Reminder;
use Livewire\Component;
use App\Models\User;
class CreateReminder extends Component
{
    public $title;
    public $description;
    public $reminder_date;
    public $send_to;

    public function close(){
        $this->reset();
    }
    public function createReminder()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'reminder_date' => 'required|date|after:today',
            'send_to' => 'required',
        ]);

        $reminder = new Reminder();
        $reminder->title = $this->title;
        $reminder->description = $this->description;
        $reminder->reminder_date = $this->reminder_date;
        
        if ($this->send_to === 'all') {
            $reminder->user_id = null; // Use null or another field to indicate "all"
        } else {
            $reminder->user_id = $this->send_to; // Specific user ID
        }
        
        $reminder->save();
        

        $this->title = '';
        $this->description = '';
        $this->reminder_date = '';
        $this->send_to = '';

        session()->flash('message', 'Reminder created successfully.');
    }
    public function render()
    {
        $users = User::all();
        return view('livewire.create-reminder',['users'=>$users]);
    }
}
