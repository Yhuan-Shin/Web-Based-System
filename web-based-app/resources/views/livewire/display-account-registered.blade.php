<div wire:poll.3000ms>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="modal fade" id="accountRegisteredModal" wire:ignore.self tabindex="-1" aria-labelledby="accountRegisteredModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="accountRegisteredModalLabel">Account Registered</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <div class="table responsive table-hover text-center">
                       <table class="table table-striped">
                           <thead>
                               <tr>
                                   <th scope="col">Email</th>
                                   <th scope="col">Address</th>
                                   <th scope="col">Contact</th>
                                   <th scope="col">Address</th>
                               </tr>
                           </thead>
                           <tbody>
                            @foreach($accounts as $account)
                               <tr>
                                      <td>{{$account->email}}</td>
                                      <td>{{$account->address}}</td>
                                      <td>{{$account->phone_number}}</td>  
                                      <td>{{$account->address}}</td>
                               </tr>
                            @endforeach
                           </tbody>
                       </table>
                   </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
