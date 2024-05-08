@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>update color
                        <a href="{{ url('admin/colors') }}"class="btn btn-danger btn-sm text-white float-end">
                            Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/colors/' . $color->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>color name</label>
                            <input type="text" name="name" value="{{ $color->name }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>color code</label>
                            <input type="text" name="code" value="{{ $color->code }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>status</label><br />
                            <input type="checkbox" name="status"{{ $color->status ? 'checked' : '' }}> checked=hidden ,
                            unchecked=visible
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-sm btn-primary"> update </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
