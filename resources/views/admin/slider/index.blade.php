@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session()->get('message') }}</div>
            @endif
            <div class="card">
                <div class="cart-header p-2">
                    <h3>Slider List
                        <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-sm text-wihte float-end">Add
                            Slider</a>

                    </h3>

                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
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
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td>
                                        <img src="{{ asset("$slider->image") }}" style="width:60px; height: 60px"
                                            alt="Slider">
                                    </td>
                                    {{-- <td>{{ $slider->Status == '0' ? 'Visible' : 'Hidden' }}</td> --}}
                                    <td>{{ $slider->status == '1' ? 'hidden' : 'visable' }}</td>
                                    <td>
                                        <a href="{{ url('admin/sliders/' . $slider->id . '/edit') }}"
                                            class="btn btn-sm btn-success"> Edite</a>

                                        <a href="{{ url('admin/sliders/' . $slider->id . '/delete') }}"
                                            onclick="return confirm('Are you sure, you want to delete this date?')"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
