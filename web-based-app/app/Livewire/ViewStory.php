<?php

namespace App\Livewire;
use App\Models\Story;
use Livewire\Component;

class ViewStory extends Component
{
    public function render()
    {
        $story = Story::all();
        return view('livewire.view-story',['story'=>$story]);
    }
}
