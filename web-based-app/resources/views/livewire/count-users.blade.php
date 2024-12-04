<div wire:poll.3000ms>
    @if($users->count() > 0)
    <p class="badge bg-light rounded-pill text-dark">{{ $users->count() }}</p>
    @else
       <p class="badge bg-danger rounded-pill">No Students Registered</p>
    @endif
</div>
