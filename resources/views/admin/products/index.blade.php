@extends('layouts.admin')

@section('content')
    <div class="row">

        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Products
                        <a href="{{ url('admin/products/create') }}" class="btn btn-primary text-white float-end">Add
                            Product</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        @if ($product->category)
                                            {{ $product->category->name }}
                                        @else
                                            No Category
                                        @endif
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success"
                                            href="{{ url('admin/products/' . $product->id . '/edit') }}">Edit</a>
                                        <a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this product?')" href="{{ url('admin/products/' . $product->id . '/delete') }}" >Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="7">No Product Available</td>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{-- {{ $product->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
