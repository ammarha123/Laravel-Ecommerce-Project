<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"  wire:click="closeModal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="storeBrand">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Select Category</label>
                        <select wire:model.defer="category_id" required class="form-control">
                            <option value="">--Select Category--</option>
                            @foreach ($categories as $cateItem)
                            <option value="{{ $cateItem->id }}">{{ $cateItem->name }}</option>
                            @endforeach
                        </select>
                    </div>
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
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"  wire:click="closeModal" >Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Brand</h5>
                <button type="button" class="close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="updateBrand">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Select Category</label>
                        <select wire:model.defer="category_id" required class="form-control">
                            <option value="">--Select Category--</option>
                            @foreach ($categories as $cateItem)
                            <option value="{{ $cateItem->id }}">{{ $cateItem->name }}</option>
                            @endforeach
                        </select>
                    </div>
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
                    <button type="button" class="btn btn-danger"  wire:click="closeModal"  data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Brand</h5>
                <button type="button" class="close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="destroyBrand">
                <div class="modal-body">
                  Are you sure want to delete this brand?
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"  wire:click="closeModal"  data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Yes. Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
