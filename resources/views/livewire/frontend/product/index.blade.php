<div>
    <div class="row">
        <div class="col-md-3">
            @if ($category->brands)

                <div class="card">
                    <div class="card-header">
                        <h4>Brands</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($category->brands as $brandItem)
                            <label class="d-block">
                                <input type="checkbox" wire:model="brandInputs"
                                    value="{{ $brandItem->name }}" />{{ $brandItem->name }}
                            </label>
                        @endforeach
                    </div>
                </div> <br />
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>price</h4>
                </div>
                <div class="card-body">

                    <label class="d-block">
                        <input type="radio" name="Pricesort" wire:model="priceInputs" value="high-to-low" />high to
                        low
                    </label>
                    <label class="d-block">
                        <input type="radio" name="Pricesort" wire:model="priceInputs" value="low-to-high" />low to
                        high
                    </label>
                </div>
            </div>
        </div>

        {{--    <div class="card">
        <div class="card-header">
            <h4>price</h4>
        </div>
        <div class="card-body">
            @foreach ($category->brands as $brandItem)
                <label class="d-block">
                    <input type="checkbox" wire:model="brandInputs"
                        value="{{ $brandItem->name }}" />{{ $brandItem->name }}
                </label>
            @endforeach
        </div>
    </div> --}}

        <div class="col-md-9">
            <div class="row">
                @forelse($products as $productsItem)
                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($productsItem->quantity > 0)
                                    <label class="stock bg-success">In Stock</label>
                                @else
                                    <label class="stock bg-danger">out Stock</label>
                                @endif
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
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4> No products Available for {{ $category->name }}</h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

{{-- <div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Products</h4>
            </div>
            @forelse($products as $productsItem)
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-img">
                            @if ($productsItem->quantity > 0)
                                <label class="stock bg-success">In Stock</label>
                            @else
                                <label class="stock bg-danger">out Stock</label>
                            @endif
                            @if ($productsItem->ProductImage->count() > 0)
                                <img src="{{ asset($productsItem->ProductImage[0]->image) }}"
                                    alt="{{ $productsItem->name }}">
                            @endif
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">{{ $productsItem->beand }}</p>
                            <h5 class="product-name">
                                <a href="">
                                    {{ $productsItem->name }}
                                </a>
                            </h5>
                            <div>
                                <span class="selling-price">{{ $productsItem->salling_price }}</span>
                                <span class="original-price">{{ $productsItem->orginal_price }}</span>
                            </div>
                            <div class="mt-2">
                                <a href="" class="btn btn1">Add To Cart</a>
                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="" class="btn btn1"> View </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>no product for {{ $category->name }}</h4>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div> --}}



{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce Navbar Design</title>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>


                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-success">In Stock</label>
                            <img src="mobile-redmi-note-8.jpg" alt="Red MI Note 8">
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">MI</p>
                            <h5 class="product-name">
                                <a href="">
                                    Red MI Note 8
                                </a>
                            </h5>
                            <div>
                                <span class="selling-price">$200</span>
                                <span class="original-price">$300</span>
                            </div>
                            <div class="mt-2">
                                <a href="" class="btn btn1">Add To Cart</a>
                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="" class="btn btn1"> View </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-success">In Stock</label>
                            <img src="casual-shirt.jpg" alt="Mens Shirt">
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">Levis</p>
                            <h5 class="product-name">
                                <a href="">
                                    Mens Shirt
                                </a>
                            </h5>
                            <div>
                                <span class="selling-price">$299</span>
                                <span class="original-price">$359</span>
                            </div>
                            <div class="mt-2">
                                <a href="" class="btn btn1">Add To Cart</a>
                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="" class="btn btn1"> View </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-success">In Stock</label>
                            <img src="headphone.jpg" alt="Head Phone">
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">Asus</p>
                            <h5 class="product-name">
                                <a href="">
                                    Head Phone
                                </a>
                            </h5>
                            <div>
                                <span class="selling-price">$399</span>
                                <span class="original-price">$499</span>
                            </div>
                            <div class="mt-2">
                                <a href="" class="btn btn1">Add To Cart</a>
                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="" class="btn btn1"> View </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html> --}}
