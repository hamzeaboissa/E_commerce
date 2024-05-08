@extends('layouts.admin')
@section('title', 'admin settings')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <div class="alert alert-success mb-3">{{ session('message') }}</div>
            @endif
            <form action="{{ url('/admin/setting') }}" method="POST">
                @csrf
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Website name</label>
                                <input type="text" name="Website_name" value="{{ $setting->Website_name ?? '' }}"
                                    class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Website url</label>
                                <input type="text" name="Website_url" value="{{ $setting->Website_url ?? '' }}"
                                    class="form-control" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>page title</label>
                                <input type="text" name="page_title" value="{{ $setting->page_title ?? '' }}"
                                    class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>meta keywords</label>
                                <textarea name="meta_keywords" class="form-control" rows="3">{{ $setting->meta_keywords ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>meta Description</label>
                                <textarea name="meta_Description" class="form-control" rows="3">{{ $setting->meta_Description ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Address</label>
                                <textarea name="Address" class="form-control" rows="3">{{ $setting->Address ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone1</label>
                                <input type="text" name="Phone1" value="{{ $setting->Phone1 ?? '' }}"
                                    class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email ID</label>
                                <input type="text" name="Email_ID" value="{{ $setting->Email_ID ?? '' }}"
                                    class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Social Media URL</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Facebook</label>
                                <input type="text" name="Facebook" value="{{ $setting->Facebook ?? '' }}"
                                    class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Instagram</label>
                                <input type="text" name="Instagram" value="{{ $setting->Instagram ?? '' }}"
                                    class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Twitter</label>
                                <input type="text" name="Twitter" value="{{ $setting->Twitter ?? '' }}"
                                    class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>YouTube</label>
                                <input type="text" name="YouTube" value="{{ $setting->YouTube ?? '' }}"
                                    class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-warning text-white">Save setting</button>
                </div>
            </form>
        </div>
    </div>
@endsection
