@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add category
                        <a
                            href="{{ url('admin/category/created') }}"class="btn btn-primary btn-sm text-white float-end">BAKE</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/category') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>name</label>
                                <input type="text" name="name" class="form-control">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>slug</label>
                                <input type="text" name="slug" class="form-control">
                                @error('slug')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>description</label>
                                <textarea type="text" name="description" class="form-control" rows="3"></textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>image</label>
                                <input type="file" name="image" class="form-control" />
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>status</label><br />
                                <input type="checkbox" name="status" />

                            </div>

                            <div class="col-md-12">
                                <h4>SEO tags</h4>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>meta_title</label>
                                <input type="text" name="meta_title" class="form-control" />
                                @error('meta_title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>meta_keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="3"></textarea>
                                @error('meta_keyword')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>meta_description</label>
                                <textarea type="text" name="meta_description" class="form-control" rows="3"></textarea>
                                @error('meta_description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary flot-end"> save </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
