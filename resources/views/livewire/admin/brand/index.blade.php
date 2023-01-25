<div>
    @include('livewire.admin.brand.modal-form')
    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>
                        Category
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addBrandModal"
                            class="btn btn-primary float-end">Add Brands</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ $brand->slug }}</td>
                                    <td>
                                        @if ($brand->category)
                                            {{ $brand->category->name }}
                                        @else
                                            No Category
                                        @endif
                                    </td>
                                    <td>{{ $brand->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a class="btn btn-success" href="#" data-bs-toggle="modal"
                                            data-bs-dismiss="modal" data-bs-target="#updateBrandModal"
                                            wire:click="editBrand({{ $brand->id }})">Edit</a>
                                        <a class="btn btn-danger" href="#" data-bs-toggle="modal"
                                            data-bs-dismiss="modal" data-bs-target="#deleteBrandModal"
                                            wire:click="deleteBrand({{ $brand->id }})">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>No Record Found.</tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
