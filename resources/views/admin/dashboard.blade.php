@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <h6 class="alert alert-success">{{ session('message') }}</h6>
            @endif
            <div class="me-md-3 me-xl-5">
                <h2>Dashboard</h2>
                <p class="mb-md-0">Your analytics dashboard template.</p>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label> Total Orders </label>
                        <h1>{{ $totalorder }}</h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">Viwe</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <label> To Day Orders </label>
                        <h1>{{ $todayorder }}</h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">Viwe</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3">
                        <label> Month Orders </label>
                        <h1>{{ $thisMonthOrder }}</h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">Viwe</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-info text-white mb-3">
                        <label> Year Orders </label>
                        <h1>{{ $thisyearOrder }}</h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">Viwe</a>
                    </div>
                </div>

            </div>
            <hr>


            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label> Total products </label>
                        <h1>{{ $totalproduct }}</h1>
                        <a href="{{ url('admin/Products') }}" class="text-white">Viwe</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3">
                        <label> total Category </label>
                        <h1>{{ $totalCategory }}</h1>
                        <a href="{{ url('admin/category') }}" class="text-white">Viwe</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-info text-white mb-3">
                        <label> total Brand </label>
                        <h1>{{ $totalBrand }}</h1>
                        <a href="{{ url('admin/Brand') }}" class="text-white">Viwe</a>
                    </div>
                </div>

            </div>
            <hr>

            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label> total All users </label>
                        <h1>{{ $totalAllusers }}</h1>
                        <a href="{{ url('admin/users') }}" class="text-white">Viwe</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3">
                        <label> total user </label>
                        <h1>{{ $totaluser }}</h1>
                        <a href="{{ url('admin/users') }}" class="text-white">Viwe</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-info text-white mb-3">
                        <label> total Admin </label>
                        <h1>{{ $totalAdmin }}</h1>
                        <a href="{{ url('admin/users') }}" class="text-white">Viwe</a>
                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection
