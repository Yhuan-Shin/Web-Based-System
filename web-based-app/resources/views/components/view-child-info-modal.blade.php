<!-- Child Info Modal -->
<div class="modal fade" id="childInfoModal" tabindex="-1" aria-labelledby="childInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="childInfoModalLabel">Child's Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <!-- Child's Information content goes here -->
                <div class="list-group">
                    @forelse ($students as $child)
                    <div class="list-group-item list-group-item-action border mb-2">
                        <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#childEditModal{{ $child->id }}">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">{{ $child->st_last_name }}, {{ $child->st_first_name }}</h6>  
                                <small>{{ $child->age }} years old </small>                                  
                            </div>
                        </a>
                            <p class="mb-1 text-muted">Gender: 
                                @if($child->gender == 'Male')
                                    <span class="badge bg-primary rounded-pill">Male</span>
                                @elseif($child->gender == 'Female')
                                    <span class="badge bg-danger rounded-pill">Female</span>
                                @endif
                                <i class="bi bi-trash-fill  float-end" style="color: red;" data-bs-toggle="modal" data-bs-target="#childDeleteModal{{ $child->id }}"></i>
                            
                            </p>
                   
                    </div>
                                        
                    @empty
                        <p>No child's information found.</p>
                    @endforelse
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                {{-- <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#childAddModal">
                    <i class="bi bi-plus"></i>
                    Add
                </button> --}}
            </div>
        </div>
    </div>
</div>