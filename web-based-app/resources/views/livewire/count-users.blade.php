<div wire:poll.3000ms>
    @if($users->count() > 0)
        {{ $users->count() }}
    @else
        No Users
    @endif
</div>
