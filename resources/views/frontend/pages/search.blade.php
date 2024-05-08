@extends('layouts.app')

@section('title', 'search Product')



@section('content')

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h4>search Product</h4>
                    <div class="underline md-4"></div>
                </div>
                @forelse ($searchProduct as $searchItem)
                    <div class="col-md-10">
                        <div class="product-card">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="product-card-img">
                                        <label class="stock bg-danger">NEW</label>

                                        @if ($searchItem->ProductImage->count() > 0)
                                            <a
                                                href="{{ url('/collections/' . $searchItem->category->slug . '/' . $searchItem->slug) }}">

                                                <img src="{{ asset($searchItem->ProductImage[0]->image) }}"
                                                    alt="{{ $searchItem->name }}">
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="product-card-body">
                                        <p class="product-brand">{{ $searchItem->brand }}</p>
                                        <h5 class="product-name">
                                            <a
                                                href="{{ url('/collections/' . $searchItem->category->slug . '/' . $searchItem->slug) }}">
                                                {{ $searchItem->name }}
                                            </a>
                                        </h5>
                                        <div>
                                            <span class="selling-price">$ {{ $searchItem->salling_price }} </span>
                                            <span class="original-price">$ {{ $searchItem->orginal_price }}</span>
                                        </div>
                                        <p style="height:45px; overflow:hidden">
                                            <b>Description</b> {{ $searchItem->description }}
                                            <a href="{{ url('/collections/' . $searchItem->category->slug . '/' . $searchItem->slug) }}"
                                                class="btn btn-outline-primary">
                                                View</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 p-2">
                        <h4> No products found</h4>
                    </div>
                @endforelse
                <div class="col-md-10">
                    {{ $searchProduct->appends(request()->input())->links() }}
                    {{-- اذا ماعمل لوب عالصفحة 2 بضيف appends --}}
                </div>
                <div class="text-center">
                    <a href="{{ url('collections') }}" class="btn btn-warning pc-3">View More</a>
                </div>
            </div>
        </div>
    </div>

@endsection
