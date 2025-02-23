<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Auth;
use App\Models\Story;
use Illuminate\Support\Facades\Storage;

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

       

        try {
            Story::create([
                'description' => $this->description,
                'image' => $image_path,
            ]);

            $this->description = '';
            $this->image = '';
            session()->flash('message', 'Story posted successfully.');
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred while posting the story.' . $e->getMessage());
        }
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

        $this->validate([
            'description' => 'required|max:255', // Add validation for the description
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional image update
        ]);

        if ($this->image) {
            // Delete old image if it exists
            if ($story->image && Storage::disk('public')->exists($story->image)) {
                Storage::disk('public')->delete($story->image);
            }

            // Store new image
            $image_path = $this->image->store('uploaded_images', 'public');
            // $image_path = $this->image->store('uploaded_images', 'public_uploads');

            $story->image = $image_path;
        }


        $story->description = $this->description;
        $story->save();

        session()->flash('message', 'Story updated successfully.');
    } catch (\Exception $e) {
        session()->flash('error', 'An error occurred while updating the story.');
    }
}

}
