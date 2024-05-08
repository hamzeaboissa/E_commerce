@extends('layouts.admin')
@section('content')
@section('title', 'orders Details')



@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success mb-3">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>My Order Details </h3>
                </div>
                <div class="card-body">
                    <div class="shadow pg-white p-3">
                        <h4 class="text-primary">

                            {{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
                                rel="stylesheet" /> --}}

                            <i class="fa fa-shopping-cart text-dark"></i> My Order Details
                            <a href="{{ url('admin/orders') }}" class="btn btn-danger btn-sm float-end mx-1">
                                <span class="fa fa-arrow-left"></span>Back
                            </a>
                            <a href="{{ url('admin/invoice/' . $order->id . '/generate') }}"
                                class="btn btn-warning btn-sm float-end mx-1">
                                <span class="fa fa-download"></span> Download invoice
                            </a>
                            <a href="{{ url('admin/invoice/' . $order->id) }}" target="_blank"
                                class="btn btn-info btn-sm float-end mx-1">
                                <span class="fa fa-eye"></span>view invoice
                            </a>

                            <a href="{{ url('admin/invoice/' . $order->id . '/mail') }}"
                                class="btn btn-success btn-sm float-end mx-1">
                                <span class="fa fa-envelope"></span> send invoice in Email
                            </a>
                        </h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Order Details</h5>
                                <hr>
                                <h6>Order ID : {{ $order->id }}</h6>
                                <h6>tracking ID : {{ $order->tracking_no }}</h6>
                                <h6>Orderd date : {{ $order->created_at->format('d-m-y h:i A') }}</h6>
                                <h6>paymant_mode : {{ $order->paymant_mode }}</h6>
                                <h6 class="border p-2 text-success">
                                    Order status message : <span class="text-uppercase">{{ $order->status_message }}</span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5>User Details</h5>
                                <hr>
                                <h6>Full Name : {{ $order->fullname }}</h6>
                                <h6>Email ID : {{ $order->email }}</h6>
                                <h6>Phone : {{ $order->phone }}</h6>
                                <h6>Address : {{ $order->address }}</h6>
                                <h6>Pin code : {{ $order->pincode }}</h6>
                            </div>
                        </div>
                        <br />
                        <hr>
                        <h5>Order Item</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Item ID</th>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $TotalPrice = 0;
                                    @endphp
                                    @foreach ($order->orderitems as $orderItem)
                                        <tr>
                                            <td width="10%">{{ $orderItem->id }}</td>
                                            <td width="10%">
                                                @if ($orderItem->product->ProductImage)
                                                    <img src="{{ asset($orderItem->product->ProductImage[0]->image) }}"
                                                        style="width: 50px; height: 50px"
                                                        alt="{{ $orderItem->product->name }}" />
                                                @else
                                                    <img src="" style="width: 50px; height: 50px" alt="" />
                                                @endif

                                            </td>
                                            <td>
                                                {
                                                @if ($orderItem->productColor)
                                                    @if ($orderItem->productColor->color)
                                                        <span>
                                                            - color: {{ $orderItem->productColor->color->name }}
                                                        </span>
                                                    @endif
                                                @endif
                                            </td>
                                            <td width="10%">${{ $orderItem->price }}</td>
                                            <td width="10%">{{ $orderItem->quantity }}</td>
                                            <td width="10%" class="fw-bold">
                                                ${{ $orderItem->quantity * $orderItem->price }}</td>
                                            @php
                                                $TotalPrice += $orderItem->quantity * $orderItem->price;
                                            @endphp
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" class="fw-bold">Total Amount : </td>
                                        <td colspan="1" class="fw-bold">${{ $TotalPrice }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border mt-3">
                <div class="card-body">
                    <h4>order process(order status update)</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{ url('admin/orders/' . $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label>Update Order Status</label>
                                <div class="input-group">
                                    <select name="order_status" class="form-select">
                                        <option value="">select order status</option>
                                        <option
                                            value="In progress"{{ Request::get('status') == 'In progress' ? 'selected' : '' }}>
                                            In progress</option>
                                        <option
                                            value="completed"{{ Request::get('status') == 'completed' ? 'selected' : '' }}>
                                            completed
                                        </option>
                                        <option value="pending"{{ Request::get('status') == 'pending' ? 'selected' : '' }}>
                                            pending
                                        </option>
                                        <option
                                            value="cancelled"{{ Request::get('status') == 'cancelled' ? 'selected' : '' }}>
                                            cancelled
                                        </option>
                                        <option
                                            value="out-for-delivery"{{ Request::get('status') == 'out-for-delivery' ? 'selected' : '' }}>
                                            out for delivery
                                        </option>
                                    </select>
                                    <button type="submit" class=" btn btn-primary taxt-white">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-7">
                            <br />
                            <h4 class="mt-3">Current order status: <span
                                    class="text-uppercase">{{ $order->status_message }}</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
