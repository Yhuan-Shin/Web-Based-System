     <!-- Child's Update Modal -->
     @foreach ($students as $child)
     <div class="modal fade" id="childEditModal{{ $child->id }}" tabindex="-1" aria-labelledby="childInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="childInfoModalLabel">Update Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Child's Information content goes here -->
                    <form action="{{ route('student.update', $child->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="student_no" class="form-label">Student No.</label>
                            <input type="text" class="form-control" id="student_no" name="student_no" value="{{ $child->student_no }}" required>
                        </div>
                        <div class="mb-3">

                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $child->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="date" name="date" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" min="1" name="age" value="{{ $child->age }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="male" {{ $child->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $child->gender == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Update</button>
                    </form>

                </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach