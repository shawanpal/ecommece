@extends('frontend.layout')

@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{{ $product->title }}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section>
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    @php $imgs = json_decode($product->images); @endphp
                    <div class="product-slick">
                        @foreach ($imgs as $img)
                        <div>
                            <img src="{{ url('public/assets/images/products/'.$img) }}" alt="" class="img-fluid blur-up lazyload image_zoom_cls-0">
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="slider-nav">
                                @foreach ($imgs as $timg)
                                <div><img src="{{ url('public/assets/images/products/'.$timg) }}" alt="" class="img-fluid blur-up lazyload"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 rtl-text">
                    <div class="product-right">
                        <h2 class="mb-0">{{ $product->title }}</h2>
                        <h5 class="mb-2">Category: {!! getProductCategories($product->id) !!}</h5>
                        @if($product->sale_price != '')
                        @php $sale = (($product->regular_price - $product->sale_price)*100) /$product->regular_price; @endphp
                        <h4><del>{{ getSiteData('site_currency').$product->regular_price }}</del><span>{{ round($sale) }}% off</span></h4>
                        <h3>{{ getSiteData('site_currency').$product->sale_price }} <span id="variation-charges">+ {{ getSiteData('site_currency') }}<span id="extra-price">0</span></h3>
                        @else
                        <h3>{{ getSiteData('site_currency').$product->regular_price }} <span id="variation-charges">+ {{ getSiteData('site_currency') }}<span id="extra-price">0</span></h3>
                        @endif
                        @php 
                        $variations = getProductData($product->id , 'variations');
                        @endphp
                        @if(!empty($variations))
                        @php
                        $variations = json_decode($variations);
                        @endphp
                        @endif
                        @if(!empty($variations))
                        <ul class="color-variant">
                            @foreach ($variations as $variation)
                            @if($variation->variations_id == 1)
                            @if($variation->variations_cost == 0)
                            @php $active = 'selected'; @endphp
                            <input type="hidden" name="variation_color" value="{{ $variation->variations_value }}">
                            @else
                            @php $active = ''; @endphp
                            @endif
                            <li id="{{ $variation->variations_value }}" class="{{ $active }}" style="background: {{ $variation->variations_value }}" data-price="{{ $variation->variations_cost }}"></li>

                            @endif
                            @endforeach
                        </ul>
                        @endif
                        <div class="product-description border-product">
                            <h6 class="product-title size-text">
                                @if(getProductData($product->id , 'size_chart') != '')
                                <span>
                                    <a href="#" data-toggle="modal" data-target="#sizemodal">size chart</a>
                                </span>
                                @endif
                            </h6>
                            @if(getProductData($product->id , 'size_chart') != '')
                            <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ $product->title }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body"><img src="{{ url('public/assets/images/'. getProductData($product->id , 'size_chart')) }}" alt="" class="img-fluid blur-up lazyload"></div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(!empty($variations))
                            <h6 class="product-title size-text">select size </h6>
                            <div class="size-box">
                                <ul>
                                    @foreach ($variations as $variation)
                                    @if($variation->variations_id == 2)
                                    @if($variation->variations_cost == 0)
                                    @php $active = 'active'; @endphp
                                    <input type="hidden" name="variation_size" value="{{ $variation->variations_value }}">
                                    @else
                                    @php $active = ''; @endphp
                                    @endif
                                    <li id="{{ $variation->variations_value }}" class="{{ $active }}" data-price="{{ $variation->variations_cost }}"><a>{{ $variation->variations_value }}</a></li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <h6 class="product-title">quantity</h6>
                            <div class="qty-box">
                                <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-angle-left"></i></button> </span>
                                    <input type="text" name="quantity" class="form-control input-number" value="1">
                                    <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span></div>
                            </div>
                        </div>
                        <input type="hidden" name="enc_id" value="{{ Crypt::encryptString($product->id) }}">
                        <input type="hidden" name="base_url" value="{{ url('/') }}">
                        <div class="product-buttons"><a onclick="addToCart()" class="btn btn-solid">add to cart</a> <a href="#" class="btn btn-solid">buy now</a>
                        </div>
                        @if(getProductData($product->id , 'short_description') != '')
                        <div class="border-product">
                            <h6 class="product-title">product details</h6>
                            {!! getProductData($product->id , 'short_description') !!}
                        </div>
                        @endif
                        <div class="border-product">
                            <h6 class="product-title">share it</h6>
                            <div class="product-icon">
                                <ul class="product-social">
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/home?status={{ URL::current() }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://pinterest.com/pin/create/button/?url={{ URL::current() }}&media=&description=" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ URL::current() }}&title=&summary=&source=" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                                @auth
                                <button class="wishlist-btn" onclick="addToWishlist()"><i class="fa fa-heart"></i><span class="title-font">Add To WishList</span></button>
                                @endauth
                                @guest
                                <button class="wishlist-btn" data-toggle="modal" data-target="#nologinaddtowishlist"><i class="fa fa-heart"></i><span class="title-font">Add To WishList</span></button>
                                @endguest

                            </div>
                            @auth
                            <div id="retmsg"></div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->

<!--  product-tab starts -->
<section class="tab-product m-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                    @if(getProductData($product->id , 'description') != '')
                    <li class="nav-item"><a class="nav-link active show" id="top-home-tab" data-toggle="tab" href="#top-home" role="tab" aria-selected="false">Description</a>
                        <div class="material-border"></div>
                    </li>
                    @endif
                    @if(getProductData($product->id , 'details') != '')
                    <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-toggle="tab" href="#top-profile" role="tab" aria-selected="false">Details</a>
                        <div class="material-border"></div>
                    </li>
                    @endif
                    @if(getProductData($product->id , 'video') != '')
                    <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-toggle="tab" href="#top-contact" role="tab" aria-selected="false">Video</a>
                        <div class="material-border"></div>
                    </li>
                    @endif
                    <li class="nav-item"><a class="nav-link" id="review-top-tab" data-toggle="tab" href="#top-review" role="tab" aria-selected="true">Write Review</a>
                        <div class="material-border"></div>
                    </li>
                </ul>
                <div class="tab-content nav-material" id="top-tabContent">
                    @if(getProductData($product->id , 'description') != '')
                    <div class="tab-pane fade active show" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                        {!! getProductData($product->id , 'description') !!}
                    </div>
                    @endif
                    @if(getProductData($product->id , 'details') != '')
                    <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                        {!! getProductData($product->id , 'details') !!}
                    </div>
                    @endif
                    @if(getProductData($product->id , 'video') != '')
                    <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                        <div class="mt-4 text-center">
                            {!! getProductData($product->id , 'video') !!}
                        </div>
                    </div>
                    @endif
                    <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                        <form class="theme-form">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="media">
                                        <label>Rating</label>
                                        <div class="media-body ml-3">
                                            <div class="rating three-star"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Your name" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" placeholder="Email" required="">
                                </div>
                                <div class="col-md-12">
                                    <label for="review">Review Title</label>
                                    <input type="text" class="form-control" id="review" placeholder="Enter your Review Subjects" required="">
                                </div>
                                <div class="col-md-12">
                                    <label for="review">Review Title</label>
                                    <textarea class="form-control" placeholder="Wrire Your Testimonial Here" id="exampleFormControlTextarea1" rows="6"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-solid" type="submit">Submit YOur Review</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product-tab ends -->

@if(!empty($related_products))
<!-- product section start -->
<section class="section-b-space ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col-12 product-related">
                <h2>related products</h2>
            </div>
        </div>
        <div class="row search-product">
            @foreach($related_products as $related_product)
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="product-box">
                    <div class="img-wrapper">
                        @php $imgs = json_decode($related_product->images); @endphp
                        @if($imgs[0])
                        <div class="front">
                            <a href="{{ url('shop/product/'.$related_product->alias) }}"><img src="{{ url('public/assets/images/products/'.$imgs[0]) }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        @endif
                        @if($imgs[1])
                        <div class="back">
                            <a href="{{ url('shop/product/'.$related_product->alias) }}"><img src="{{ url('public/assets/images/products/'.$imgs[1]) }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        @endif
                        <div class="cart-info cart-wrap">
                            <a href="javascript:void(0)" onclick="addToCartSingle('{{Crypt::encryptString($related_product->id) }}')">
                                <i class="ti-shopping-cart"></i>
                            </a>
                            @auth
                            <a href="javascript:void(0)" onclick="addToWishlistSingle('{{Crypt::encryptString($related_product->id) }}')">
                                <i class="ti-heart" aria-hidden="true"></i>
                            </a>
                            @endauth
                            @guest
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#nologinaddtowishlist">
                                <i class="ti-heart" aria-hidden="true"></i>
                            </a>
                            @endguest
                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                <i class="ti-search" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                        <a href="{{ url('shop/product/'.$related_product->alias) }}">
                            <h6>{{ $related_product->title }}</h6>
                        </a>
                        @if($related_product->sale_price != '')
                        <h5><del>{{ getSiteData('site_currency').$related_product->regular_price }}</del></h5>
                        <h4>{{ getSiteData('site_currency').$related_product->sale_price }}</h4>
                        @else
                        <h4>{{ getSiteData('site_currency').$related_product->regular_price }}</h4>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- product section end -->
@endif
@endsection