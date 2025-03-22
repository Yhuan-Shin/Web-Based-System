<div wire:poll.3000ms>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="modal fade" id="bmiModalTest" wire:ignore.self tabindex="-1" aria-labelledby="bmiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="bmiModalLabel">BMI Calculator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
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
                                        <label for="height" class="form-label">Height (cm)</label>
                                        <input type="number" name="height" class="form-control" id="height" wire:model="height" placeholder="Enter height" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="weight" class="form-label">Weight (lbs)</label>
                                        <input type="number" placeholder="Enter weight" wire:model="weight" name="weight" class="form-control" id="weight" required>
                                        
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-select" id="gender" wire:model="gender" required>
                                            <option value=""  selected>Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="weight" class="form-label">Age</label>
                                        <input type="number" placeholder="Enter Age" wire:model="age" name="weight" class="form-control" id="weight" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">Calculate</button>
                                </form>
                            </div>
                            <div class="col">
                               @if ($result)
                                <div class="mt-4 p-4 bg-gray-100 rounded">
                                    <h3 class="text-lg font-semibold">BMI Result</h3>
                                    <p><strong>Weight:</strong> {{ $result['weight'] }} kg</p>
                                    <p><strong>Height:</strong> {{ $result['height'] }} cm</p>
                                    <p><strong>Age:</strong> {{ $result['age'] }} years</p>
                                    <p><strong>BMI:</strong> {{ $result['bmi'] }}</p>
                                    <p><strong>Category:</strong> 
                                        <span class="font-bold badge 
                                            @if($result['category'] === 'Underweight') bg-warning 
                                            @elseif($result['category'] === 'Normal weight') bg-success 
                                            @elseif($result['category'] === 'Overweight') bg-primary 
                                            @else bg-danger 
                                            @endif">
                                            {{ $result['category'] }}
                                        </span>
                                    </p>
                                </div>
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
