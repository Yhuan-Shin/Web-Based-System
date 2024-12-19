<div wire:poll.3000ms>
    <!-- BMI Modal -->
    <div class="modal fade" id="bmiModal" wire:ignore.self tabindex="-1" aria-labelledby="bmiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="bmiModalLabel">BMI Calculator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col border-end">
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                
                                @if (session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                
                                <form wire:submit.prevent="calculate">
                                    @csrf
                                    @method('POST')
                                
                                    <div class="mb-3">
                                        <label for="st_last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="st_last_name" wire:model="st_last_name" name="st_last_name" placeholder="Enter your child's Last Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="st_first_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="st_first_name" wire:model="st_first_name" name="st_first_name" placeholder="Enter your child's First Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="st_middle_name" class="form-label">Middle Name</label>
                                        <input type="text" class="form-control" id="st_middle_name" wire:model="st_middle_name" name="st_middle_name" placeholder="Enter your child's Middle Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="height" class="form-label">Height (cm)</label>
                                        <input type="number" name="height" class="form-control" id="height" wire:model="height" placeholder="Enter your child's height" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="weight" class="form-label">Weight (lbs)</label>
                                        <input type="number" placeholder="Enter your child's weight" wire:model="weight" name="weight" class="form-control" id="weight" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">Calculate</button>
                                </form>
                            </div>
                            <div class="col">
                                {{-- result --}}
                                @if ($bmiRecord)
                                        <h4>Result</h4>
                                        <p>Hi, {{ $st_last_name }}, {{ $st_first_name }} {{ $st_middle_name }}</p>
                                        <p>Your weight is: {{ $weight }} lbs</p>
                                        <p>Your height is: {{ $height }} cm</p>
                                        <hr>
                                
                                        <p>Your BMI is: {{ $bmi }}</p>
                                        <hr>
                                        <p class="mb-0">
                                            Your BMI category is:
                                            @if($result == 'Severely Wasted')
                                                <span class="badge bg-primary rounded-pill">Severely Wasted</span>
                                            @elseif($result == 'Underweight')
                                                <span class="badge bg-warning rounded-pill">Underweight</span>
                                            @elseif($result == 'Normal')
                                                <span class="badge bg-success rounded-pill">Normal</span>
                                            @elseif($result == 'Overweight')
                                                <span class="badge bg-danger rounded-pill">Overweight</span>
                                            @elseif($result == 'Obese')
                                                <span class="badge bg-danger rounded-pill">Obese</span>
                                            @endif

                                              
                                        </p>
                                @else
                                    <h4>Result</h4>
                                    <p>Please enter your child's information</p>
                                @endif
                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="close">Close</button>
                </div>
            </div>

        </div>
    </div>
    
</div>
