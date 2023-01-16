<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="storeBrand">
                <div class="modal-body">
                   <div class="mb-3">
                    <label for="name">Brand Name</label>
                    <input type="text" wire:model.defer="name" class="form-control">
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                   </div>
                   <div class="mb-3">
                    <label for="name">Brand Slug</label>
                    <input type="text" wire:model.defer="slug" class="form-control">
                    @error('slug')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                   </div>
                   <div class="mb-3">
                    <input type="checkbox" wire:model.defer="status">
                    <label for="name">Status</label>
                    <br> Note: Check= Hidden; Uncheck= Visible
                   </div>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
