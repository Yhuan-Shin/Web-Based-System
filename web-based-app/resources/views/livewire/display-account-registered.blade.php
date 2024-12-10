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
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
             @foreach($accounts as $account)
                <tr>
                        <td>{{$account->name}}</td>
                       <td>{{$account->email}}</td>
                       <td>{{$account->address}}</td>
                       <td>{{$account->phone_number}}</td>  
                       <td>{{$account->address}}</td>
                        <td style="white-space: nowrap">
                            @if($account->confirmed == 1) 
                            <i class="bi bi-check-circle-fill" style="color: green"></i> Approved
                            @else 
                            <i class="bi bi-x-circle-fill" style="color: yellow"></i> Pending 
                            @endif</td>
                        <td style="white-space: nowrap">
                            @if($account->confirmed ==1)
                            <button class="btn btn-success p-2" disabled>Approve</button>
                            @else
                            <button class="btn btn-success p-2" data-bs-toggle="modal" data-bs-target="#approveModal{{$account->id}}">Approve</button>
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
