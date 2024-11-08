<div>
    {{-- Modal for Calendar --}}
    <div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scheduleModalLabel">Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                                                  
                                                       <div class="table-responsive">
                                                           <table class="table table-bordered table-striped">
                                                               <thead>
                                                                   <tr>
                                                                       <th>Title</th>
                                                                       <th>Description</th>
                                                                       <th>Date and Time</th>
                                                                   </tr>
                                                               </thead>
                                                               <tbody>
                                                                   @foreach ($planners as $schedule)
                                                                       <tr>
                                                                           <td>{{ $schedule->title }}</td>
                                                                           <td>{{ $schedule->description }}</td>
                                                                           <td>{{ $schedule->planner_date->timezone('Asia/Manila')->format('F j, Y g:i A') }}</td>
                                                                       </tr>
                                                                   @endforeach
                                                               </tbody>
                                                           </table>
                                                       </div>
                         </div>
                   </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    
</div>
