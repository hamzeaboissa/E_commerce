@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session()->get('message') }}</div>
            @endif
            <div class="card">
                <div class="cart-header p-2">
                    <h3>edit Slider
                        <a href="{{ url('admin/sliders/') }}" class="btn btn-danger btn-sm text-wihte float-end">Back</a>

                    </h3>

                </div>
                <div class="card-body">
                    <form action="{{ url('admin/sliders/' . $slider->id) }}"method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT');

                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" value="{{ $slider->title }}" class="form-control" />

                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ $slider->description }}</textarea>

                        </div>
                        <div class="mb-3">
                            <label>Image</label><br />
                            <input type="file" name="image" class="form-control" />
                            <img src="{{ asset("$slider->image") }}" style="width:90px;height:90px" alt="Slider" />
                        </div>
                        <div class="mb-3">
                            <label>Status</label><br />
                            <input type="checkbox" name="status" {{ $slider->status == '1' ? 'checked' : '' }}
                                style="width:20px;height:20px" />Checket=Hiddden,UnChecken=Visible
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">update</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
