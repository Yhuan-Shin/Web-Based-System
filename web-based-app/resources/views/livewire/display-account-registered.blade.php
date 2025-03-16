<div wire:poll.3000ms>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Search" wire:model="search">
            </div>
            <div class="col-md-2">
                <select class="form-select" wire:model="roleFilter">
                    <option value="">All</option>
                    <option value="teacher">Teacher</option>
                    <option value="parent">Parent</option>
                </select>
            </div>
        </div>
    </div>
    <div class="table responsive table-hover text-center table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    {{-- <th scope="col">Student/s</th> --}}
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Role</th>
                   
                </tr>
            </thead>
            <tbody>
             @foreach($accounts as $account)
              <!-- Confirm Deactivate Modal -->
              <div class="modal fade" wire:ignore.self id="confirmDeactivateModal{{$account->id}}" tabindex="-1" aria-labelledby="confirmDeactivateModalLabel{{$account->id}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeactivateModalLabel{{$account->id}}">Deactivate Account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to deactivate this account?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" wire:click="deactivate({{$account->id}})" data-bs-dismiss="modal">Deactivate</button>
                        </div>
                    </div>
                </div>
            </div>
                <tr>
                        <td>
                            @if($account->last_name == null  && $account->first_name == null && $account->middle_name == null)
                                {{$account->google_name}}
                            @else
                                {{$account->last_name}}, {{$account->first_name}} {{$account->middle_name}}
                            @endif
                        </td>
                        {{-- <td>
                            @foreach($account->students as $student)
                                @if($loop->first && $loop->count > 1)
                                    <ul>
                                @endif
                                <li>{{$student->st_first_name}}, {{$student->st_last_name}}</li>
                                @if($loop->last && $loop->count > 1)
                                    </ul>
                                @endif
                            @endforeach
                        </td> --}}
  
                       <td>{{$account->email}}</td>
                       <td>{{$account->address}}</td>
                       <td>{{$account->phone_number}}</td>  
                       <td>
                        @if($account->role == 'teacher')
                            <span class="badge bg-primary">Teacher</span>
                        @elseif($account->role == 'parent')
                            <span class="badge bg-success">Parent</span>
                        @endif
                       </td>
                
                </tr>
             @endforeach
            </tbody>
        </table>
            {{ $accounts->links() }}    
    </div>
</div>
