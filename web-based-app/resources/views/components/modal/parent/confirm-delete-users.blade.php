<!-- Delete Confirmation Modal -->
<div class="modal fade" id="confirmDelete{{$account->id}}" wire:ignore.self tabindex="-1" aria-labelledby="confirmDeleteLabel{{$account->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteLabel{{$account->id}}">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this account?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" wire:click="delete({{$account->id}})" data-bs-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>