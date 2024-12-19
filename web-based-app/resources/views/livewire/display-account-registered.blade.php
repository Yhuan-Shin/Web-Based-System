<div wire:poll.3000ms>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="table responsive table-hover text-center table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Student/s</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
             @foreach($accounts as $account)
                <tr>
                        <td>
                            @if($account->last_name == null  && $account->first_name == null && $account->middle_name == null)
                                {{$account->google_name}}
                            @else
                                {{$account->last_name}}, {{$account->first_name}} {{$account->middle_name}}
                            @endif
                        </td>
                        <td>
                            @foreach($account->students as $student)
                                @if($loop->first && $loop->count > 1)
                                    <ul>
                                @endif
                                <li>{{$student->st_first_name}}, {{$student->st_last_name}}</li>
                                @if($loop->last && $loop->count > 1)
                                    </ul>
                                @endif
                            @endforeach
                        </td>
  
                       <td>{{$account->email}}</td>
                       <td>{{$account->address}}</td>
                       <td>{{$account->phone_number}}</td>  
                        <td style="white-space: nowrap">
                            @if($account->confirmed == 1) 
                            <i class="bi bi-check-circle-fill" style="color: green"></i> Approved
                            @else 
                            <i class="bi bi-x-circle-fill" style="color: yellow"></i> Pending 
                            @endif</td>
                        <td style="white-space: nowrap">
                            @if($account->confirmed ==1)
                            <button class="btn btn-success p-2" disabled>Approve</button>
                            <button class="btn btn-danger p-2" disabled>Decline</button>
                            @else
                            <button class="btn btn-success p-2" data-bs-toggle="modal" data-bs-target="#approveModal{{$account->id}}">Approve</button>
                            <button class="btn btn-danger p-2" data-bs-toggle="modal" data-bs-target="#declineModal{{$account->id}}">Decline</button>
                            <!-- Decline Modal -->
                            <div class="modal fade" wire:ignore.self id="declineModal{{$account->id}}" tabindex="-1" aria-labelledby="declineModalLabel{{$account->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="declineModalLabel{{$account->id}}">Decline Account</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to decline this account?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-danger" wire:click="decline({{$account->id}})" data-bs-dismiss="modal">Decline</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Approve Modal -->
                            <div class="modal fade" wire:ignore.self id="approveModal{{$account->id}}" tabindex="-1" aria-labelledby="approveModalLabel{{$account->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="approveModalLabel{{$account->id}}">Approve Account</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to approve this account?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-success" wire:click="approve({{$account->id}})" data-bs-dismiss="modal">Approve</button>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            @endif
                           

                        </td>
                </tr>
             @endforeach
            </tbody>
        </table>
    </div>
</div>
