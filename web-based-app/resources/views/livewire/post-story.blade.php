<div>
    <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-success mt-2" role="alert" >
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
<div class="container">
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
