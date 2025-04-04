@foreach($students as $student)
    <div class="modal fade" id="profileModal{{$student->id}}" wire:ignore.self tabindex="-1" aria-labelledby="profileModalLabel{{$student->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel{{$student->id}}">Student Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Name: {{ $student->st_last_name }} {{ $student->st_first_name }} {{ $student->st_middle_name }}</p>
                    <p>Age: {{ $student->age }}</p>
                    <p>Gender: {{ $student->gender }}</p>
                    <p>Religion: {{ $student->religion }}</p>
                    <p>Health Condition: {{ $student->health_condition ? $student->health_condition : 'N/A' }}</p>
                    <p>Allergies: {{ $student->allergies ? $student->allergies : 'N/A' }}</p>
                    <p>Parent/Guardian: {{ $student->user ? ($student->user->last_name && $student->user->first_name ? $student->user->last_name . ', ' . $student->user->first_name : $student->user->google_name) : 'N/A' }}</p>
                    <p>Phone Number: {{ $student->user ? $student->user->phone_number : 'N/A' }}</p>
                    <p>Height: {{ $student->bmi ? $student->bmi->height : 'N/A' }} cm</p>
                    <p>Weight: {{ $student->bmi ? $student->bmi->weight : 'N/A' }} lbs</p>
                    <p>BMI: {{ $student->bmi ? $student->bmi->bmi : 'N/A' }}</p>
                    <p>Category: {{ $student->bmi ? $student->bmi->result : 'N/A' }}</p>
                    <p>Teacher: {{ $student->teacher ? $student->teacher->first_name . ' ' . $student->teacher->last_name : 'N/A' }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach