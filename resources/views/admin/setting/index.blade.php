@extends('layouts.admin')

@section('title', 'Side Settings')
@section('content')
<div class="row">
    @if (session('message'))
        <div class="alert alert-success mb-3">
            {{ session('message') }}
        </div>
    @endif
    <div class="col-md-12 grid-margin">
        <form action="{{ url('/admin/settings') }}" method="POST">
            @csrf
            <div class="card-mb-3 bg-white">
                <div class="card-header bg-primary text-white">
                    <h4 class="my-auto">Website</h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Website Name: </label>
                            <input type="text" name="website_name" value="{{ $setting->website_name ?? " " }}" class="form-control mt-3 mb-3" id="">
                        </div>
                        <div class="col-md-6">
                            <label>Website URL: </label>
                            <input type="text" name="website_url"  value="{{ $setting->website_url ?? " " }}" class="form-control mt-3 mb-3" id="">
                        </div>
                        <div class="col-md-12">
                            <label>Page Title: </label>
                            <input type="text" name="page_title"  value="{{ $setting->page_title ?? " " }}" class="form-control mt-3 mb-3" id="">
                        </div>
                        <div class="col-md-6">
                            <label>Meta Keywords: </label>
                            <textarea name="meta_keyword" id="" rows="3" class="form-control mt-3"> {{ $setting->meta_keyword ?? " " }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Meta Description: </label>
                            <textarea name="meta_description" id="" rows="3" class="form-control mt-3">{{ $setting->meta_description ?? " " }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-mb-3 bg-white mt-3">
                <div class="card-header bg-primary text-white">
                    <h4 class="my-auto">Website - Information</h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Address: </label>
                            <textarea name="address" id="" rows="3" class="form-control mt-3 mb-3">{{ $setting->address ?? " " }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Phone 1*: </label>
                            <input type="text" name="phone1" class="form-control mt-3 mb-3" id=""  value="{{ $setting->phone1 ?? " " }}" required>
                        </div>
                        <div class="col-md-6">
                            <label>Phone 2: </label>
                            <input type="text" name="phone2" class="form-control mt-3 mb-3"  value="{{ $setting->phone2 ?? " " }}" id="">
                        </div>
                        <div class="col-md-6">
                            <label>Email 1*:</label>
                            <input type="text" name="email1" class="form-control mt-3 mb-3"  value="{{ $setting->email1 ?? " " }}" id="" required>
                        </div>
                        <div class="col-md-6">
                            <label>Email 2: </label>
                            <input type="text" name="email2" class="form-control mt-3 mb-3"  value="{{ $setting->email2 ?? " " }}" id="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-mb-3 bg-white mt-3">
                <div class="card-header bg-primary text-white">
                    <h4 class="my-auto">Website - Social Media</h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Facebook (Optional) </label>
                            <input type="text" name="facebook" class="form-control mt-3 mb-3"  value="{{ $setting->facebook ?? " " }}" id="">
                        </div>
                        <div class="col-md-6">
                            <label>Twitter (Optional) </label>
                            <input type="text" name="twitter" value="{{ $setting->twitter ?? " " }}" class="form-control mt-3 mb-3" id="">
                        </div>
                        <div class="col-md-6">
                            <label>Instagram (Optional)</label>
                            <input type="text" name="instagram" class="form-control mt-3 mb-3"  value="{{ $setting->instagram ?? " " }}" id="">
                        </div>
                        <div class="col-md-6">
                            <label>Youtube (Optional)</label>
                            <input type="text" name="youtube" class="form-control mt-3 mb-3"  value="{{ $setting->youtube ?? " " }}" id="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary text-white">Save Settings</button>
            </div>
        </form>
    </div>
</div>
@endsection