<div wire:poll.3000ms>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="usersModal" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="usersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="usersModalLabel">Users</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <div class="table responsive table-hover text-center">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Age</th>
                                <th scope="col">BMI</th>
                                <th scope="col">Profile</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$student->name}}</td>
                                <td>{{$student->age}}</td>
                                <td>{{ $student->bmi ? $student->bmi->bmi : 'N/A' }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-trigger="hover" data-bs-toggle="popover"  data-bs-html="true" title="User Profile"
                                            data-bs-content="<h6>Name: {{ $student->name }}</h6><br>
                                            Age: {{ $student->age }}<br>
                                            Gender: {{ $student->gender }}<br>
                                            Guardian: {{ $student->user ? $student->user->name : 'N/A' }}<br>
                                            Phone Number: {{ $student->user ? $student->user->phone_number : 'N/A' }}<br>
                                            Height: {{ $student->bmi->height }} cm<br>
                                            Weight: {{ $student->bmi->weight }} lbs<br>
                                            BMI: {{ $student->bmi ? $student->bmi->bmi : 'N/A' }}">
                                        <i class="bi bi-eye"></i> See Profile
                                    </button>
                                </td>
                                
                            </tr>
                            @endforeach
                            {{$students->links()}}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
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
