<div wire:poll.3000ms>
         <!-- Child's Update Modal -->
         @foreach ($students as $child)
         <div class="modal fade" wire:ignore.self id="childEditModal{{ $child->id }}" tabindex="-1" aria-labelledby="childInfoModalLabel" aria-hidden="true">
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
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="student_name" value="{{ $child->student_name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="Grade" class="form-label">Grade</label>
                                <select class="form-select" id="grade" name="grade" required>
                                    <option value="" disabled selected>Select Grade</option>
                                    <option value="kinder">Kinder</option>
                                    <option value="Grade1">Grade 1</option>
                                    <option value="Grade2">Grade 2</option> 
                                    <option value="Grade3">Grade 3</option>
                                    <option value="Grade4">Grade 4</option>
                                    <option value="Grade5">Grade 5</option>
                                    <option value="Grade6">Grade 6</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="section" class="form-label">Section</label>
                                <select class="form-select" id="section" name="section"  required>
                                    <option value="" disabled selected>Select Section</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="childDOB" class="form-label">Child's Date of Birth</label>
                                <input type="date" class="form-control" id="date" wire:model="birthday" value="{{ $child->birthday }}" name="birthday" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="childAge" class="form-label">Child's Age</label>
                                <input type="number" class="form-control" id="age" name="age" wire:model="age" value="{{ $child->age }}" min="1" required  readonly >
                                @error('age') 
                                    <span class="text-danger">{{ $message }}</span> 
                                  
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="Male" {{ $child->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $child->gender == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary float-end">Update</button>
                        </form>
    
                    </div>
                    </div>
                </div>
            </div>
            @endforeach
 </div>

