<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Auth;
use App\Models\Story;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostStory extends Component
{
    use WithFileUploads;
    public $description;
    public $image;

    public function submit(){
        $this->validate([
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image_path = $this->image->store('uploaded_images', 'public');
        // $image_path = $this->image->store('uploaded_images', 'public_uploads');

       

        Story::create([
            'user_id' => Auth::id(),
            'description' => $this->description,
            'image' => $image_path,
        ]);

        $this->description = '';
        $this->image = '';
        session()->flash('message', 'Story posted successfully.');
    }
    public function render()
    {
        return view('livewire.post-story');
    }
}
