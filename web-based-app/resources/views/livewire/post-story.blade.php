<div>
    <div class="modal fade" wire:ignore.self id="postStoryModal"  tabindex="-1" aria-labelledby="postStoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postStoryModalLabel">Post Story</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                </div>
                <div class="modal-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form wire:submit.prevent="submit">
                        @csrf
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" wire:model="description" required> 
                            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" wire:model="image" required  accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Post Story</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
