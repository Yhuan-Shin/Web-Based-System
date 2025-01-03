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
        $story = Story::all();
        return view('livewire.post-story', ['story' => $story]);
    }
    public function delete($id){
        $story = Story::find($id);
        $story->delete();
        session()->flash('message', 'Story deleted successfully.');
    }
    public function update($id)
{
    try {
        $story = Story::find($id);

        // if (!$story || $story->user_id !== Auth::id()) {
        //     session()->flash('error', 'You are not authorized to update this story.');
        //     return;
        // }

        $this->validate([
            'description' => 'required|max:255', // Add validation for the description
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional image update
        ]);

        // if ($this->image) {
        //     // Upload the new image and delete the old one if necessary
        //     $image_path = $this->image->store('uploaded_images', 'public');
        //     $story->image = $image_path;
        // }

        $story->description = $this->description;
        $story->save();

        session()->flash('message', 'Story updated successfully.');
    } catch (\Exception $e) {
        session()->flash('error', 'An error occurred while updating the story.');
    }
}

}
