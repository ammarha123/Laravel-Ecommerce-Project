@extends('layouts.admin')

@section('content')
    <div class="row">

        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mt-3">Add Slider
                        <a href="{{ url('admin/sliders/') }}" class="btn btn-primary text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/sliders/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id=""  class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" name="status">
                            <label for="name">Status</label>
                            <br>Checked=Hidden, Unchecked=Visible
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
