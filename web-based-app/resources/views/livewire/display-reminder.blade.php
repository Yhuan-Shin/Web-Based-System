<div wire:poll.3000ms> 
    <div class="modal fade" id="reminderModal" wire:ignore.self tabindex="-1" aria-labelledby="reminderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reminderModalLabel">Reminder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @foreach ($reminders as $reminder)
                        <div class="card mb-3">
                            <div class="card-body">
                                <small class="text-muted">
                                    {{ $reminder->created_at->diffForHumans() }}
                                </small>
                                <h6 class="card-title">    
                                    {{ $reminder->title }}
                                    <i class="bi bi-trash-fill float-end" style="font-size: 20px; color: red;" wire:click="deleteReminder({{ $reminder->id }})"></i>

                                </h6>
                                <p class="card-text">{{ $reminder->description }}</p>
                                
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>  
        

    </div>
</div>
