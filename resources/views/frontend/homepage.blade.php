@extends('frontend.layout')

@section('content')
<!-- Home slider -->
<section class="p-0">
    <div class="slide-1 home-slider">
        @foreach ($sliders as $slider)
        <div>
            <div class="home  text-center">
                <img src="{{ url('public/assets/images/home-banner/'.$slider->image) }}" alt="" class="bg-img blur-up lazyload">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="slider-contain">
                                <div>
                                    <h4>{{ $slider->sub_title }}</h4>
                                    <h1>{{ $slider->title }}</h1>
                                    <a href="{{ $slider->link }}" class="btn btn-solid">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- Home slider end -->

<!-- collection banner -->
<section class="pb-0 ratio2_1">
    <div class="container">
        <div class="row partition2">
            @foreach ($collections as $collection)
            <div class="col-md-6">
                <a href="{{ $collection->link }}">
                    <div class="collection-banner p-right text-center">
                        <div class="img-part">
                            <img src="{{ url('public/assets/images/'.$collection->image) }}" class="img-fluid blur-up lazyload bg-img" alt="">
                        </div>
                        <div class="contain-banner">
                            <div>
                                <h4>{{ $collection->sub_title }}</h4>
                                <h2>{{ $collection->title }}</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- collection banner end -->

<!-- Paragraph-->
<div class="title1 section-t-space">
    <h4>special offer</h4>
    <h2 class="title-inner1">top collection</h2>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="product-para">
                <p class="text-center">{{ getSiteData('top_collection_text') }}</p>
            </div>
        </div>
    </div>
</div>
<!-- Paragraph end -->

<!-- Product slider -->
<section class="section-b-space p-t-0 ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="product-4 product-m no-arrow">
                    <div class="product-box">
                        <div class="img-wrapper">
                            <div class="front">
                                <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/27.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            <div class="back">
                                <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/28.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            <div class="cart-info cart-wrap">
                                <button data-toggle="modal" data-target="#addtocart" title="Add to cart">
                                    <i class="ti-shopping-cart"></i>
                                </button>
                                <a href="javascript:void(0)" title="Add to Wishlist">
                                    <i class="ti-heart" aria-hidden="true"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                    <i class="ti-search" aria-hidden="true"></i>
                                </a>
                                <a href="compare.html" title="Compare">
                                    <i class="ti-reload" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-detail">
                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            </div>
                            <a href="product-page(no-sidebar).html">
                                <h6>Slim Fit Cotton Shirt</h6>
                            </a>
                            <h4>$500.00</h4>
                            <ul class="color-variant">
                                <li class="bg-light0"></li>
                                <li class="bg-light1"></li>
                                <li class="bg-light2"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-box">
                        <div class="img-wrapper">
                            <div class="lable-block"><span class="lable3">new</span> <span class="lable4">on
                                    sale</span></div>
                            <div class="front">
                                <a href="product-page(no-sidebar).html">
                                    <img src="../assets/images/pro3/1.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            <div class="back">
                                <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/2.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            <div class="cart-info cart-wrap">
                                <button data-toggle="modal" data-target="#addtocart" title="Add to cart"><i class="ti-shopping-cart"></i></button> <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i
                                        class="ti-search" aria-hidden="true"></i></a> <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a></div>
                        </div>
                        <div class="product-detail">
                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            </div>
                            <a href="product-page(no-sidebar).html">
                                <h6>Slim Fit Cotton Shirt</h6>
                            </a>
                            <h4>$500.00 <del>$600.00</del></h4>
                            <ul class="color-variant">
                                <li class="bg-light0"></li>
                                <li class="bg-light1"></li>
                                <li class="bg-light2"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-box">
                        <div class="img-wrapper">
                            <div class="lable-block"><span class="lable3">new</span> <span class="lable4">on
                                    sale</span></div>
                            <div class="front">
                                <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/33.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            <div class="back">
                                <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/34.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            <div class="cart-info cart-wrap">
                                <button data-toggle="modal" data-target="#addtocart" title="Add to cart"><i class="ti-shopping-cart"></i></button> <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i
                                        class="ti-search" aria-hidden="true"></i></a> <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a></div>
                        </div>
                        <div class="product-detail">
                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            </div>
                            <a href="product-page(no-sidebar).html">
                                <h6>Slim Fit Cotton Shirt</h6>
                            </a>
                            <h4>$500.00</h4>
                            <ul class="color-variant">
                                <li class="bg-light0"></li>
                                <li class="bg-light1"></li>
                                <li class="bg-light2"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-box">
                        <div class="img-wrapper">
                            <div class="front">
                                <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/35.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            <div class="back">
                                <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/36.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            <div class="cart-info cart-wrap">
                                <button data-toggle="modal" data-target="#addtocart" title="Add to cart"><i class="ti-shopping-cart"></i></button> <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i
                                        class="ti-search" aria-hidden="true"></i></a> <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a></div>
                        </div>
                        <div class="product-detail">
                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            </div>
                            <a href="product-page(no-sidebar).html">
                                <h6>Slim Fit Cotton Shirt</h6>
                            </a>
                            <h4>$500.00</h4>
                            <ul class="color-variant">
                                <li class="bg-light0"></li>
                                <li class="bg-light1"></li>
                                <li class="bg-light2"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-box">
                        <div class="img-wrapper">
                            <div class="lable-block"><span class="lable3">new</span> <span class="lable4">on
                                    sale</span></div>
                            <div class="front">
                                <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/33.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            <div class="back">
                                <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/34.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            <div class="cart-info cart-wrap">
                                <button data-toggle="modal" data-target="#addtocart" title="Add to cart"><i class="ti-shopping-cart"></i></button> <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i
                                        class="ti-search" aria-hidden="true"></i></a> <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a></div>
                        </div>
                        <div class="product-detail">
                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            </div>
                            <a href="product-page(no-sidebar).html">
                                <h6>Slim Fit Cotton Shirt</h6>
                            </a>
                            <h4>$500.00</h4>
                            <ul class="color-variant">
                                <li class="bg-light0"></li>
                                <li class="bg-light1"></li>
                                <li class="bg-light2"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product slider end -->
@endsection