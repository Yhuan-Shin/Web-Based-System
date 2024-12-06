<div wire:poll.3000ms>
    {{-- Nothing in the world is as soft and yielding as water. --}}
@if($account->count() > 0)
    <p class="badge bg-light rounded-pill text-dark" style="font-size: 12px">{{ $account->count() }}</p>
@else
    <p class="badge bg-danger rounded-pill" style="font-size: 12px">No Account Registered</p>
@endif
</div>
