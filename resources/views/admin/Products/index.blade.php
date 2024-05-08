@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Products
                        <a href="{{ url('admin/Products/create') }}"class="btn btn-primary btn-sm text-white float-end">
                            Add Products</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>category</th>
                                <th>product</th>
                                <th>price</th>
                                <th>quantity</th>
                                <th>status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        @if ($product->category)
                                            {{ $product->category->name }}
                                        @else
                                            no category
                                        @endif

                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->salling_price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->status == '1' ? 'hidden' : 'visable' }}</td>
                                    <td>

                                        <a href="{{ url('admin/Products/' . $product->id . '/edit') }}"
                                            class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ url('admin/Products/' . $product->id . '/delete') }}"
                                            onclick="return confirm('are you suer want delete?')"
                                            class="btn btn-sm btn-danger">delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">no product added </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
