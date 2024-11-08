<?php

namespace App\Livewire;
use App\Models\User;
use App\Models\Planner;
use Livewire\Component;

class CreatePlanner extends Component
{
    public $title;
    public $description;
    public $planner_date;
    public $send_to;
    public function close(){
        $this->reset();
    }
    public function submit(){
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'planner_date' => 'required|date|after:today',
            'send_to' => 'required',
        ]);
        $planner = new Planner();
        $planner->title = $this->title;
        $planner->description = $this->description;
        $planner->planner_date = $this->planner_date;
        $planner->user_id = $this->send_to;
        
        if ($this->send_to === 'all') {
            $planner->user_id = null; // Use null or another field to indicate "all"
        } else {
            $planner->user_id = $this->send_to; // Specific user ID
        }

        $planner->save();
        session()->flash('message', 'Planner created successfully.');
        $this->reset();
    }
    public function render()
    {
        $users_ = User::all();
        return view('livewire.create-planner', ['users_' => $users_]);
    }
}
