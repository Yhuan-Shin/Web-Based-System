<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table table-striped mt-5 text-center caption-top">
        <caption class="text-white">Reminder Table</caption>

        <thead class="table-dark">
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                {{-- <th scope="col">Send to</th> --}}
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($reminders as $reminder)
            <div class="modal fade"  id="deleteModal{{ $reminder->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Reminder</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this reminder?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('reminder.destroy', $reminder->id) }}" method="POST" ">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>    
                </div>
            </div>
            <tr>
                <td>{{ $reminder->title }}</td>
                <td>{{ $reminder->description }}</td>
                <td>{{ $reminder->reminder_date }}</td>
                {{-- <td>{{ $reminder->send_to }}</td> --}}
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $reminder->id }}">Edit</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $reminder->id }}">Delete</button>
                </td>
            </tr>
            @empty
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                No reminder found!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endforelse
        </tbody>
    </table>
</div>
