<div wire:poll.3000ms>
<div class="table responsive table-hover text-center">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Age</th>
                <th scope="col">BMI</th>
                <th scope = "col">Category</th>
                <th scope="col">Profile</th>
                {{-- <th scope="col">Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$student->student_name}}</td>
                <td>{{$student->gender}}</td>
                <td>{{$student->age}}</td>
                <td>{{ $student->bmi ? $student->bmi->bmi : 'N/A' }}</td>
                <td>{{ $student->bmi ? $student->bmi->result : 'N/A' }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-trigger="hover" data-bs-toggle="popover"  data-bs-html="true" title="User Profile"
                            data-bs-content="<h6>Name: {{ $student->student_name }}</h6><br>
                            Age: {{ $student->age }}<br>
                            Gender: {{ $student->gender }}<br>
                            Guardian: {{ $student->user ? $student->user->name : 'N/A' }}<br>
                            Phone Number: {{ $student->user ? $student->user->phone_number : 'N/A' }}<br>
                            Height: {{ $student->bmi ? $student->bmi->height : 'N/A' }} cm<br>
                            Weight: {{ $student->bmi ? $student->bmi->weight : 'N/A' }} lbs<br>
                            BMI: {{ $student->bmi ? $student->bmi->bmi : 'N/A' }}<br>
                            Category: {{ $student->bmi ? $student->bmi->result : 'N/A' }}">
                        <i class="bi bi-eye"></i> See Profile
                    </button>
                </td>
                {{-- <td>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateModal{{$student->id}}">
                        <i class="bi bi-pencil"></i> Update
                    </button>

                    <div class="modal fade" wire:ignore.self id="updateModal{{$student->id}}" tabindex="-1" aria-labelledby="updateModalLabel{{$student->id}}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModalLabel{{$student->id}}">Update Information</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.student.update', $student->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td> --}}
            </tr>
            @endforeach
            {{$students->links()}}
        </tbody>
    </table>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        popoverTriggerList.map(function (popoverTriggerEl) {
            new bootstrap.Popover(popoverTriggerEl);
        });
    });
</script>

</div>
