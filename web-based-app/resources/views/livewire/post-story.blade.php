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
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-2 float-end" data-bs-toggle="modal" data-bs-target="#postStoryModal">
        Post Story
    </button>
    <table class="table table-striped text-center">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($story as $story)
                <tr>
                    <td>{{ $story->description }}</td>
                    <td><img src="{{ asset('storage/' . $story->image) }}" alt="Story Image" width="100"></td>
                    <td>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $story->id }}">Delete</button>

                        <!-- Confirm Delete Modal -->
                        <div class="modal fade" id="confirmDeleteModal{{ $story->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $story->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel{{ $story->id }}">Confirm Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this story?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger" wire:click="delete({{ $story->id }})" data-bs-dismiss="modal">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    

    <!-- Modal -->
    <div class="modal fade" id="postStoryModal" tabindex="-1" aria-labelledby="postStoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postStoryModalLabel">Post Story</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="submit">
                        @csrf
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" wire:model="description" required> 
                            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" wire:model="image" required accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Post Story</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
