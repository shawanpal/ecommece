@extends('backend.layout')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Products
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="{{ admin_url('dashboard') }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
                        <li class="breadcrumb-item">Products</li>
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Product</h5>
                    </div>
                    <form action="#" method="post" id="edit-product-form">
                        <div class="form-row">
                            <div class="col-md-12">
                                <label>Product Name:</label>
                                <input type="text" class="form-control" placeholder="Product Name" value="{{ $product->title }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Regular Price:</label>
                                <input type="text" class="form-control" placeholder="Regular Price" value="{{ $product->regular_price }}">
                            </div>
                            <div class="col-md-6">
                                <label>Sale Price:</label>
                                <input type="text" class="form-control" placeholder="Sale Price" value="{{ $product->sale_price }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">
                                <label>Top Collection:</label>
                                @if($product->is_top_collection == 1)
                                    <div class="radioLeft">
                                        <input type="radio" class="form-control" value="1" checked> Yes
                                        <input type="radio" class="form-control" value="0"> No
                                    </div>
                                @else
                                    <div class="radioLeft">
                                        <input type="radio" class="form-control" value="1"> Yes
                                        <input type="radio" class="form-control" value="0" checked> No
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <label>Latest Product</label>
                                @if($product->is_new_product == 1)
                                    <div class="radioLeft">
                                        <input type="radio" class="form-control" value="1" checked> Yes
                                        <input type="radio" class="form-control" value="0"> No
                                    </div>
                                @else
                                    <div class="radioLeft">
                                        <input type="radio" class="form-control" value="1"> Yes
                                        <input type="radio" class="form-control" value="0" checked> No
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <label>Is Top Collection</label>
                                @if($product->is_best_seller == 1)
                                <div class="radioLeft">
                                    <input type="radio" class="form-control" value="1" checked> Yes
                                    <input type="radio" class="form-control" value="0"> No
                                </div>
                                @else
                                    <div class="radioLeft">
                                        <input type="radio" class="form-control" value="1"> Yes
                                        <input type="radio" class="form-control" value="0" checked> No
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <label>Is Top Collection</label>
                                @if($product->is_featured == 1)
                                    <div class="radioLeft">
                                        <input type="radio" class="form-control" value="1" checked> Yes
                                        <input type="radio" class="form-control" value="0"> No
                                    </div>
                                @else
                                    <div class="radioLeft">
                                        <input type="radio" class="form-control" value="1"> Yes
                                        <input type="radio" class="form-control" value="0" checked> No
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label>Product Image:</label>
                                <input type="file" name="product_image" multiple class="form-control">
                                <div class="row product-img-gallery">
                                    @php $imgs = json_decode($product->images); @endphp
                                    @foreach ($imgs as $img)
                                    <div class="col-md-2">
                                        <img src="{{ url('public/assets/images/products/'.$img) }}" alt="" class="fullwidth-img">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection