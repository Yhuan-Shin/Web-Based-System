<div>
    <div class="modal fade" id="plannerModal" wire:ignore.self tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Planner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="close"></button>
                </div>
                <div class="modal-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" wire:model="title" placeholder="Title" required>
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" wire:model="description" placeholder="Description" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="date" class="form-label">Date</label>
                            <input type="datetime-local" class="form-control" id="date" wire:model="planner_date" placeholder="Date" required>
                            @error('planner_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="send_to">Send to</label>
                            <select class="form-control" wire:model="send_to" required>
                                <option value=""selected>Send to</option>
                                <option value="all">Send to all</option>
                                @foreach ($users_ as $user)
                                    @if ($user->id != auth()->id())
                                        <option value="{{ $user->id }}">{{ $user->first_name ?? $user->google_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('send_to')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="close">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="submit">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
