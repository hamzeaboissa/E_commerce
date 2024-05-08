@extends('layouts.app')

@section('title', 'Thank You for shopping')
@section('content')

    <div class="py-3 pyt-md-4">
        <div class="container">
            <div class="raw">
                <div class="col-md-12 text-center">
                    <div class="p-4 shadow bg-darck">
                        <h2>you logo</h2>
                        <h4>Thank You for shopping'</h4>
                        <a href="{{ url('collections') }} " class="btn btn-primary">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
