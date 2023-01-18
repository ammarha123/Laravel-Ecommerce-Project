@extends('layouts.admin')

@section('content')
    <div class="row">

        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Color List
                        <a href="{{ url('admin/colors/create') }}" class="btn btn-primary text-white float-end">Add
                            Colors</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/color_section/create') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="name">Color Code</label>
                            <input type="text" name="code" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="name">Status</label>
                            <input type="checkbox" name="status">
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
