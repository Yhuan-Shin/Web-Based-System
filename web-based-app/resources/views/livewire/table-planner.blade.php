<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table table-striped mt-5 text-center caption-top">
        <caption class="text-white">Planner Table</caption>

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
            @forelse ($planners as $planner)
            <div class="modal fade"  id="deleteModal{{ $planner->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Planner</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this planner?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('planner.destroy', $planner->id) }}" method="POST" ">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="editModal{{ $planner->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Planner</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('planner.update', $planner->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $planner->title }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $planner->description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="planner_date" class="form-label">Date</label>
                                    <input type="datetime-local" class="form-control" id="planner_date" name="planner_date" value="{{ $planner->planner_date }}" required>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                <tr>
                    <td>{{ $planner->title }}</td>
                    <td>{{ $planner->description }}</td>
                    <td>{{ $planner->planner_date->format('F j, Y g:i A') }}</td>
                    {{-- <td>{{ $planner->user_id }}</td> --}}
                    <td>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $planner->id }}">Edit</button>
                        <button data-bs-toggle="modal" data-bs-target="#deleteModal{{ $planner->id }}
                            " class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No planner found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
