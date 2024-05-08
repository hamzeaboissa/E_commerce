@extends('layouts.app')

@section('title', 'orders')



@section('content')

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="clo-md-12">
                    <div class="shadow pg-white p-3">
                        <h4 class="md-4"> My Orders</h4>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>traking no</th>
                                        <th>User name</th>
                                        <th>Ordered date</th>
                                        <th>payment mode</th>
                                        <th>status message</th>
                                        <th>action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($orders as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->tracking_no }}</td>
                                            <td>{{ $item->fullname }}</td>
                                            <td>{{ $item->created_at->format('d-m-y') }}</td>
                                            <td>{{ $item->paymant_mode }}</td>
                                            <td>{{ $item->status_message }}</td>
                                            <td><a href="{{ url('orders/' . $item->id) }}"
                                                    class="btn btn-primary
                                                    btn-sm">viewo</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No order available</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            <div>
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
