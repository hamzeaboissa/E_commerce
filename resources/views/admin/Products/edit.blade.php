@extends('layouts.admin')
@section('content')
    <div class="row">
        @if (session('message'))
            <h5 class="alert alert-success">{{ session('message') }}</h4>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>edit Products
                        <a href="{{ url('admin/Products') }}"class="btn btn-danger btn-sm text-white float-end">
                            Back</a>
                    </h3>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/Products/' . $Product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">
                                    Home
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seotag-tab" data-bs-toggle="tab"
                                    data-bs-target="#seotag-tab-pane" type="button" role="tab"
                                    aria-controls="seotag-tab-pane" aria-selected="false">
                                    seo tags
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                    data-bs-target="#details-tab-pane" type="button" role="tab"
                                    aria-controls="details-tab-pane" aria-selected="false">
                                    details
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                    data-bs-target="#image-tab-pane" type="button" role="tab"
                                    aria-controls="image-tab-pane" aria-selected="false">
                                    product image
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="color-tab" data-bs-toggle="tab"
                                    data-bs-target="#color-tab-pane" type="button" role="tab">
                                    product color
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option
                                                value="{{ $category->id }}"{{ $category->id == $Product->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="md-3">
                                    <label>product name</label>
                                    <input type="text" name="name" value="{{ $Product->name }}" class="form-control">
                                </div>
                                <div class="md-3">
                                    <label>product slug</label>
                                    <input type="text" name="slug" value="{{ $Product->slug }} "class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>select brand</label>
                                    <select name="brand" class="form-control">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}"
                                                {{ $brand->id == $Product->brand ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>small_description (500 words)</label>
                                    <textarea name="small_description" class="form-control" rows="4">{{ $Product->small_description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label>description (500 words)</label>
                                    <textarea name="description" class="form-control" rows="4">{{ $Product->description }} </textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel"
                                aria-labelledby="seotag-tab" tabindex="0">
                                <div class="md-3">
                                    <label>meta_title</label>
                                    <input type="text" name="meta_title" value="{{ $Product->meta_title }}"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>meta_description</label>
                                    <textarea name="meta_description" class="form-control" rows="4">{{ $Product->meta_description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label>meta_keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4">{{ $Product->meta_keyword }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel"
                                aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="md-3">
                                            <label>orginal_price</label>
                                            <input type="text" name="orginal_price"
                                                value="{{ $Product->orginal_price }}" class="form-control">
                                        </div>
                                        <div class="md-3">
                                            <label>salling_price</label>
                                            <input type="text" name="salling_price"
                                                value="{{ $Product->salling_price }}" class="form-control">
                                        </div>
                                        <div class="md-3">
                                            <label>quantity</label>
                                            <input type="number" name="quantity" value="{{ $Product->quantity }}"
                                                class="form-control">
                                        </div>
                                        <div class="md-3">
                                            <label>traending</label>
                                            <input type="checkbox" name="traending"
                                                {{ $Product->traending == '1' ? 'checked' : '' }}>
                                        </div>
                                        <div class="md-3">
                                            <label>Featured</label>
                                            <input type="checkbox" name="Featured"
                                                {{ $Product->Featured == '1' ? 'checked' : '' }}>
                                        </div>
                                        <div class="md-3">
                                            <label>status</label>
                                            <input type="checkbox" name="status"
                                                {{ $Product->status == '1' ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel"
                                aria-labelledby="image-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>upload product image</label>
                                    <input type="file" name="image[]" multiple class="form-control" />

                                </div>
                                @if ($Product->ProductImage)
                                    <div class="row">
                                        @foreach ($Product->ProductImage as $image)
                                            <div class="col md-2">
                                                <img src="{{ asset($image->image) }}" style="width:80px;height:80px;"
                                                    class="me-4 border" alt="img" />
                                                <a href="{{ url('admin/Product-image/' . $image->id . '/delete') }}"
                                                    class="d-block">Remove</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <h5>no images added</h5>
                                @endif
                            </div>

                            <div class="tab-pane fade border p-3" id="color-tab-pane" role="tabpanel" tabindex="0">
                                <div class="row">
                                    @forelse ($colors as $coloritem)
                                        <div class="col-md-3">
                                            <h4>add product color</h4>
                                            <div class="p-2 mb-3 border">
                                                color: <input type="checkbox" name="colors[{{ $coloritem->id }}]"
                                                    value="{{ $coloritem->id }}" />
                                                {{ $coloritem->name }}
                                                <br />
                                                Quantity: <input type="number"
                                                    name="colorquantity[{{ $coloritem->id }}]"
                                                    style="width: 90px; border:1px solid" />
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-md-12">
                                            <h1>no color found</h1>
                                        </div>
                                    @endforelse


                                </div>

                                <div class="table-responsive">
                                    <table class="table table-sm table-border">
                                        <thead>
                                            <tr>
                                                <th>color name</th>
                                                <th>quantity</th>
                                                <th>delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Product->ProductColors as $procolor)
                                                <tr class="prod-color-tr">

                                                    <td>
                                                        @if ($procolor->color)
                                                            {{ $procolor->color->name }}
                                                        @else
                                                            no color found
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="input-group mb-3" style="width: 150px;">
                                                            <input type="text" value="{{ $procolor->quantity }}"
                                                                class="productcolorquantity form-control form-control-sm ">
                                                            <button type="button" value="{{ $procolor->id }}"
                                                                class="updateproductcolorBtn btn btn-success btn-sm text-white">udate</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" value="{{ $procolor->id }}"
                                                            class="deleteproductcolorBtn btn btn-danger btn-sm text-white">delete</button>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">update</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.updateproductcolorBtn', function() {

                var product_id = "{{ $Product->id }}";
                var prod_color_id = $(this).val();
                var qty = $(this).closest('.prod-color-tr').find('.productcolorquantity').val();

                // alert(prod_color_id);
                if (qty <= 0) {
                    alert('Quantity is shuold inter');
                    return false;
                }
                var data = {
                    'product_id': product_id,
                    //'prod_color_id': prod_color_id,
                    'qty': qty
                };
                $.ajax({
                    type: "POST",
                    url: "/admin/product-color/" + prod_color_id,
                    data: data,

                    success: function(response) {
                        alert(response.message)

                    }
                });
            });
            $(document).on('click', '.deleteproductcolorBtn', function() {
                var prod_color_id = $(this).val();
                var thisClick = $(this);

                $.ajax({
                    type: "GET",
                    url: "/admin/product-color/" + prod_color_id + "/delete",
                    success: function(response) {
                        thisClick.closest('.prod-color-tr').remove();
                        alert(response.message)

                    }




                });
            });
        });
    </script>
@endsection
{{-- @section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.updateProductColorBtn', function() {
                var product_id = "{{ $product->id }}";
                var prod_color_id = $(this).val();
                var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();
                // alert(qty );
                if (qty <= 0) {
                    alert('Quantity is requir' + prod_color_id);
                    return false;
                }
                var data = {
                    'product_id': product_id,
                    'qty': qty
                };
                $.ajax({
                    type: "POST",
                    url: "/admin/product-color/" + prod_color_id,
                    data: data,
                    success: function(response) {
                        alert(response.message)

                    }
                });


            });
            $(document).on('click', '.deleteProductColorBtn', function() {
                var prod_color_id = $(this).val();
                var thisClick = $(this);

                $.ajax({
                    type: "GET",
                    url: "/admin/product-color/" + prod_color_id + "/delete",
                    success: function(response) {
                        thisClick.closest('.prod-color-tr').remove();
                        alert(response.message)

                    }




                });
            });

        });
    </script>
@endsection
 --}}
