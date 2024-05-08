<div>

    <div class="py-3 py-md-5">
        <div class="container">
            <div>
                {{--    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif --}}
            </div>
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border" wire:ignore>
                        @if ($product->ProductImage)
                            {{--   <img src="{{ asset($product->ProductImage[0]->image) }}" class="w-50" alt="Img"> --}}
                            <div class="exzoom" id="exzoom">

                                <div class="exzoom_img_box">
                                    <ul class='exzoom_img_ul'>
                                        @foreach ($product->ProductImage as $ItemImage)
                                            <li><img src="{{ asset($ItemImage->image) }}" /></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="exzoom_nav"></div>
                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn">
                                        < </a>
                                            <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                                </p>
                            </div>
                        @else
                            no image add
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-1">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}

                        </h4>
                        <hr>
                        <p class="product-path text-muted">
                            Home / {{ $product->Category->name }} / {{ $product->name }}
                        </p>
                        <p class="product-path text-info">Brand : {{ $product->brand }}</p>
                        <div>
                            <span class="selling-price text-white bg-success">${{ $product->salling_price }}</span>
                            <span class="original-price">${{ $product->orginal_price }}</span>
                        </div>
                        <div>
                            @if ($product->ProductColors->count() > 0)
                                @if ($product->ProductColors)
                                    @foreach ($product->ProductColors as $colorItem)
                                        {{-- <input type="radio" name="colorselection"
                                            value="{{ $colorItem->id }}">{{ $colorItem->color->name }} --}}
                                        <label class="colorselectionlable"
                                            style="background-color:{{ $colorItem->color->code }}"
                                            wire:click="colorselected({{ $colorItem->id }})">
                                            {{ $colorItem->color->name }}
                                        </label>
                                    @endforeach
                                @endif
                                <div>
                                    @if ($this->productcolorselectedquantity == 'outofstock')
                                        <label class="btn-sm py-1 text-white bg-danger">out Stock</label>
                                    @elseif ($this->productcolorselectedquantity > 0)
                                        <label class="btn-sm py-1 text-white bg-success">In Stock</label>
                                    @endif
                                </div>
                            @else
                                @if ($product->quantity)
                                    <label class="btn-sm py-1 text-white bg-success">In Stock</label>
                                @else
                                    <label class="btn-sm py-1 text-white bg-danger">out Stock</label>
                                @endif
                            @endif

                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrmintqut"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCuont" readonly
                                    value="{{ $this->quantityCuont }}" class="input-quantity" />
                                <span class="btn btn1" wire:click="incrmintqut "><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="addToCard({{ $product->id }})" class="btn btn1">
                                <i class="fa fa-shopping-cart"></i> Add To Cart
                            </button>
                            <button type="button" wire:click="AddToWishlist({{ $product->id }})" class="btn btn1">
                                <span wire:loading.remove wire:target="AddToWishlist">
                                    <i class="fa fa-heart">
                                    </i> Add To Wishlist
                                </span>
                                <span wire:loading wire:target="AddToWishlist">Adding...</span>
                            </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {!! $product->small_description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- for related product with the same brand --}}
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h4>
                        Related
                        @if ($product)
                            {{ $product->brand }}
                        @endif
                        Products
                    </h4>
                    <div class="underline"></div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-Carousel">
                        @foreach ($category->relatedProducts /*->take(2) */ as $relatedproductsItem)
                            {{-- take() for number of thing --}}
                            @if ($relatedproductsItem->brand == "$product->brand")
                                <div class="item mb-3">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            @if ($relatedproductsItem->ProductImage->count() > 0)
                                                <a
                                                    href="{{ url('/collections/' . $relatedproductsItem->category->slug . '/' . $relatedproductsItem->slug) }}">

                                                    <img src="{{ asset($relatedproductsItem->ProductImage[0]->image) }}"
                                                        alt="{{ $relatedproductsItem->name }}">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $relatedproductsItem->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('/collections/' . $relatedproductsItem->category->slug . '/' . $relatedproductsItem->slug) }}">
                                                    {{ $relatedproductsItem->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">$ {{ $relatedproductsItem->salling_price }}
                                                </span>
                                                <span class="original-price">$
                                                    {{ $relatedproductsItem->orginal_price }}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                            {{-- @empty
                            <div class="col-md-12 p-2">
                                <h4> No Related products Available</h4>
                            </div> --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{-- end related product with brand --}}

        {{-- for related product with out brand --}}
        <div class="py-3 py-md-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <h4>
                            Related
                            @if ($category)
                                {{ $category->name }}
                            @endif
                            Products
                        </h4>
                        <div class="underline"></div>
                    </div>
                    <div class="col-md-12">
                        @if ($category)
                            <div class="owl-carousel owl-theme four-Carousel">
                                @foreach ($category->relatedProducts /*->take(2) */ as $relatedproductsItem)
                                    {{-- take() for number of thing --}}
                                    <div class="item mb-3">
                                        <div class="product-card">
                                            <div class="product-card-img">
                                                @if ($relatedproductsItem->ProductImage->count() > 0)
                                                    <a
                                                        href="{{ url('/collections/' . $relatedproductsItem->category->slug . '/' . $relatedproductsItem->slug) }}">

                                                        <img src="{{ asset($relatedproductsItem->ProductImage[0]->image) }}"
                                                            alt="{{ $relatedproductsItem->name }}">
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="product-card-body">
                                                <p class="product-brand">{{ $relatedproductsItem->brand }}</p>
                                                <h5 class="product-name">
                                                    <a
                                                        href="{{ url('/collections/' . $relatedproductsItem->category->slug . '/' . $relatedproductsItem->slug) }}">
                                                        {{ $relatedproductsItem->name }}
                                                    </a>
                                                </h5>
                                                <div>
                                                    <span class="selling-price">$
                                                        {{ $relatedproductsItem->salling_price }}
                                                    </span>
                                                    <span class="original-price">$
                                                        {{ $relatedproductsItem->orginal_price }}</span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="p-2">
                                <h4> No Related products Available</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- end related product --}}

    </div>
    @push('scripts')
        <script>
            $(function() {

                $("#exzoom").exzoom({

                    "navWidth": 60,
                    "navHeight": 60,
                    "navItemNum": 5,
                    "navItemMargin": 7,
                    "navBorder": 1,
                    "autoPlay": true,
                    "autoPlayTimeout": 2000
                });

            });

            $('.four-Carousel').owlCarousel({
                loop: true,
                margin: 10,
                dots: true,
                nav: false,
                /*   autoPlay: 3000, //Set AutoPlay to 3 seconds
                  dots: true, */
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            })
        </script>
    @endpush
