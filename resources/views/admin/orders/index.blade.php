    @extends('layouts.admin')
    @section('content')
    @section('title', 'orders')



    @section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>My Order
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Filter by date</label>
                                    <input type="date" name="date" value="{{ Request::get('date') ?? date('y-m-d') }}"
                                        class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label>Filter by status</label>
                                    <select name="status" class="form-select">
                                        <option value="">select status</option>
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
                                </div>
                                <div class="col-md-12">
                                    <br />
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>

                        </form>
                        <hr>
                        {{-- <h4 class="md-4"> My Orders</h4> --}}
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
                                            <td><a href="{{ url('admin/orders/' . $item->id) }}"
                                                    class="btn btn-primary
                                                    btn-sm">show</a>
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
    @endsection
