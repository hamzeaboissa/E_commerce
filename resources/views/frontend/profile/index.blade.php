@extends('layouts.app')

@section('title', 'user profile')



@section('content')

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h4>user profile
                        <a href="change-password" class="btn btn-info float-end">Change Password</a>
                    </h4>
                    <div class="underline md-4"></div>
                    <div class="col-md-10">

                        @if (session('message'))
                            <p class="alert alert-success">{{ session('message') }}</p>
                        @endif
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="caed shadow">
                            <div class="card-header bg-primary">
                                <h4 class="mb-0 text-white">User Details</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('profile') }}" method="POST">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>User Name</label>
                                                <input type="text" name="username" value="{{ Auth::user()->name }}"
                                                    class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Email</label>
                                                <input type="text" name="email" readonly
                                                    value="{{ auth::user()->email }}" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Phone number</label>
                                                <input type="text" name="Phone"
                                                    value="{{ auth::user()->userDetail->Phone ?? '' }}"
                                                    class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Pin Code</label>
                                                <input type="text" name="Pin_Code"
                                                    value="{{ auth::user()->userDetail->Pin_Code ?? '' }}"
                                                    class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Address</label>
                                                <input type="text" name="address"
                                                    value="{{ auth::user()->userDetail->address ?? '' }}"
                                                    class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary"> Save Data</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
