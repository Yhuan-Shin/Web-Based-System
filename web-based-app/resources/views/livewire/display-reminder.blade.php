<div wire:poll.3000ms> 
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @foreach ($reminders as $reminder)
    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">{{ $reminder->title }}

          </h5>
          <small>{{ $reminder->created_at->diffForHumans() }}<i class="bi bi-trash-fill float-end" style="font-size: 15px; color: red;" wire:click="deleteReminder({{ $reminder->id }})"></i>
          </small>
          </div>
          <small>{{ $reminder->description }}</small>
      </a>
     
    @endforeach
</div>
