<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="modal fade" id="reminderModal" wire:ignore.self tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Reminder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="close"></button>
                </div>
                <div class="modal-body">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form wire:submit.prevent="createReminder">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" maxlength="30" wire:model="title" placeholder="Enter title" required>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" wire:model="description" maxlength="100" placeholder="Enter description" required></textarea>

                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="datetime-local" class="form-control" wire:model="reminder_date" placeholder="Enter date and time" required>
                            @error('reminder_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="send_to">Send to</label>
                            <select class="form-control" wire:model="send_to" required>
                                <option value=""selected>Send to</option>
                                <option value="all">Send to all</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('send_to')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="close">Close</button>
                    <button type="submit" class="btn btn-primary ">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
