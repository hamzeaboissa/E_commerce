@extends('layouts.app')

@section('title', 'new-Arrivals')



@section('content')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>New Arrivals</h4>
                    <div class="underline md-4"></div>
                </div>
                @forelse ($newArrivalsProduct as $productsItem)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">
                                <label class="stock bg-danger">NEW</label>

                                @if ($productsItem->ProductImage->count() > 0)
                                    <a
                                        href="{{ url('/collections/' . $productsItem->category->slug . '/' . $productsItem->slug) }}">

                                        <img src="{{ asset($productsItem->ProductImage[0]->image) }}"
                                            alt="{{ $productsItem->name }}">
                                    </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $productsItem->brand }}</p>
                                <h5 class="product-name">
                                    <a
                                        href="{{ url('/collections/' . $productsItem->category->slug . '/' . $productsItem->slug) }}">
                                        {{ $productsItem->name }}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">$ {{ $productsItem->salling_price }} </span>
                                    <span class="original-price">$ {{ $productsItem->orginal_price }}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 p-2">
                        <h4> No products Available</h4>
                    </div>
                @endforelse
                <div class="text-center">
                    <a href="{{ url('collections') }}" class="btn btn-warning pc-3">View More</a>
                </div>
            </div>
        </div>
    </div>

@endsection
