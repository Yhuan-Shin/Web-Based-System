<div wire:poll.3000ms>
    @if($users->count() > 0)
    <p class="badge bg-light rounded-pill text-dark" style="font-size: 12px">{{ $users->count() }}</p>
    @else
       <p class="badge bg-danger rounded-pill" style="font-size: 12px">No Students Registered</p>
    @endif
</div>
