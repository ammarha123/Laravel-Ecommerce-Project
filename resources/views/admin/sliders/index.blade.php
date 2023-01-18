@extends('layouts.admin')

@section('content')
    <div class="row">

        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Slider List
                        <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary text-white float-end">Add
                            Slider</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td>
                                        <img src="{{ asset("$slider->image") }}" style="width:70px" alt="Slider">
                                    </td>
                                    <td>{{ $slider->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success"
                                            href="{{ url('admin/sliders/' . $slider->id . '/edit') }}">Edit</a>
                                        <a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this product?')" href="{{ url('admin/sliders/' . $slider->id . '/delete') }}" >Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="7">No Product Available</td>
                            @endforelse 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
