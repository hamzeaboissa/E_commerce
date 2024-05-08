@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>colors list
                        <a href="{{ url('admin/colors/create') }}"class="btn btn-primary btn-sm text-white float-end">
                            Add color</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>color name</th>
                                <th>color code</th>
                                <th>status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $color)
                                <tr>
                                    <td>{{ $color->id }}</td>
                                    <td>{{ $color->name }}</td>
                                    <td>{{ $color->code }}</td>
                                    <td>{{ $color->status ? 'Hidden' : 'visible' }}</td>
                                    <td>
                                        <a
                                            href="{{ url('admin/colors/' . $color->id . '/edit') }}"class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ url('admin/colors/' . $color->id . '/delete') }}"
                                            onclick="return confirm('you want to delete color?')"
                                            class="btn btn-sm btn-danger">delete</a>
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
