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
                    @foreach($collection_products as $collection_product)
                    <div class="product-box">
                        <div class="img-wrapper">
                            <div class="lable-block">
                                @if($collection_product->is_new_product == 1)
                                <span class="lable3">new</span>
                                @endif
                                @if($collection_product->sale_price != '')
                                <span class="lable4">on sale</span>
                                @endif
                            </div>
                            @php $imgs = json_decode($collection_product->images); @endphp
                            @if(array_key_exists(0,$imgs))
                            <div class="front">
                                <a href="{{ product_url($collection_product->alias) }}"><img src="{{ url('public/assets/images/products/'.$imgs[0]) }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            @endif
                            @if(array_key_exists(1,$imgs))
                            <div class="back">
                                <a href="{{ product_url($collection_product->alias) }}"><img src="{{ url('public/assets/images/products/'.$imgs[1]) }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            @endif
                            <div class="cart-info cart-wrap">
                                <a href="javascript:void(0)" onclick="addToCartSingle('{{Crypt::encryptString($collection_product->id) }}')">
                                    <i class="ti-shopping-cart"></i>
                                </a>
                                @auth
                                <a href="javascript:void(0)" onclick="addToWishlistSingle('{{Crypt::encryptString($collection_product->id) }}')">
                                    <i class="ti-heart" aria-hidden="true"></i>
                                </a>
                                @endauth
                                @guest
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#nologinaddtowishlist">
                                    <i class="ti-heart" aria-hidden="true"></i>
                                </a>
                                @endguest
                                <a href="javascript:void(0)" onclick="quickView('{{Crypt::encryptString($collection_product->id) }}')">
                                    <i class="ti-search" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-detail">
                            <div class="rating">{!! product_rating($collection_product->id) !!}</div>
                            <a href="{{ product_url($collection_product->alias) }}">
                                <h6>{{ $collection_product->title }}</h6>
                            </a>
                            @if($collection_product->sale_price != '')
                            <h5><del>{{ getSiteData('site_currency').$collection_product->regular_price }}</del></h5>
                            <h4>{{ getSiteData('site_currency').$collection_product->sale_price }}</h4>
                            @else
                            <h4>{{ getSiteData('site_currency').$collection_product->regular_price }}</h4>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product slider end -->

<!-- Parallax banner -->
<section class="p-0">
    <div class="full-banner parallax text-center p-left">
        <img src="{{ url('public/assets/images/parallax/'.$special->banner) }}" alt="" class="bg-img blur-up lazyload">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="banner-contain">
                        @if($special->special_title != '')
                        <h2>{{ $special->special_title }}</h2>
                        @endif
                        @if($special->title != '')
                        <h3>{{ $special->title }}</h3>
                        @endif
                        @if($special->sub_title != '')
                        <h4>{{ $special->sub_title }}</h4>
                        @endif
                        @if($special->link != '')
                        <a href="{{ $special->link }}" class="btn btn-solid">shop now</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Parallax banner end -->

<!-- Tab product -->
<div class="title1 section-t-space">
    <h4>exclusive products</h4>
    <h2 class="title-inner1">special products</h2>
</div>
<section class="section-b-space p-t-0 ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="theme-tab">
                    <ul class="tabs tab-title">
                        <li class="current tab-product" data-id="new-product"><a href="javascript:void(0)">New Products</a></li>
                        <li class="tab-product" data-id="featured-product"><a href="javascript:void(0)">Featured Products</a></li>
                        <li class="tab-product" data-id="best-sellers"><a href="javascript:void(0)">Best Sellers</a></li>
                    </ul>
                    <div class="tab-content-cls">
                        <div id="new-product" class="tab-content active default">
                            <div class="no-slider row">
                                @foreach($new_products as $new_product)
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            @if($new_product->is_new_product == 1)
                                            <span class="lable3">new</span>
                                            @endif
                                            @if($new_product->sale_price != '')
                                            <span class="lable4">on sale</span>
                                            @endif
                                        </div>
                                        @php $imgs = json_decode($new_product->images); @endphp
                                        @if(array_key_exists(0,$imgs))
                                        <div class="front">
                                            <a href="{{ product_url($new_product->alias) }}"><img src="{{ url('public/assets/images/products/'.$imgs[0]) }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                        </div>
                                        @endif
                                        @if(array_key_exists(1,$imgs))
                                        <div class="back">
                                            <a href="{{ product_url($new_product->alias) }}"><img src="{{ url('public/assets/images/products/'.$imgs[1]) }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                        </div>
                                        @endif
                                        <div class="cart-info cart-wrap">
                                            <a href="javascript:void(0)" onclick="addToCartSingle('{{Crypt::encryptString($new_product->id) }}')">
                                                <i class="ti-shopping-cart"></i>
                                            </a>
                                            @auth
                                            <a href="javascript:void(0)" onclick="addToWishlistSingle('{{Crypt::encryptString($new_product->id) }}')">
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
                                        <div class="rating">{!! product_rating($new_product->id) !!}</div>
                                        <a href="{{ product_url($new_product->alias) }}">
                                            <h6>{{ $new_product->title }}</h6>
                                        </a>
                                        @if($new_product->sale_price != '')
                                        <h5><del>{{ getSiteData('site_currency').$new_product->regular_price }}</del></h5>
                                        <h4>{{ getSiteData('site_currency').$new_product->sale_price }}</h4>
                                        @else
                                        <h4>{{ getSiteData('site_currency').$new_product->regular_price }}</h4>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="featured-product" class="tab-content">
                            <div class="no-slider row">
                                @foreach($featured_products as $featured_product)
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            @if($featured_product->is_new_product == 1)
                                            <span class="lable3">new</span>
                                            @endif
                                            @if($featured_product->sale_price != '')
                                            <span class="lable4">on sale</span>
                                            @endif
                                        </div>
                                        @php $imgs = json_decode($featured_product->images); @endphp
                                        @if(array_key_exists(0,$imgs))
                                        <div class="front">
                                            <a href="{{ product_url($featured_product->alias) }}"><img src="{{ url('public/assets/images/products/'.$imgs[0]) }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                        </div>
                                        @endif
                                        @if(array_key_exists(1,$imgs))
                                        <div class="back">
                                            <a href="{{ product_url($featured_product->alias) }}"><img src="{{ url('public/assets/images/products/'.$imgs[1]) }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                        </div>
                                        @endif
                                        <div class="cart-info cart-wrap">
                                            <a href="javascript:void(0)" onclick="addToCartSingle('{{Crypt::encryptString($featured_product->id) }}')">
                                                <i class="ti-shopping-cart"></i>
                                            </a>
                                            @auth
                                            <a href="javascript:void(0)" onclick="addToWishlistSingle('{{Crypt::encryptString($featured_product->id) }}')">
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
                                        <div class="rating">{!! product_rating($featured_product->id) !!}</div>
                                        <a href="{{ product_url($featured_product->alias) }}">
                                            <h6>{{ $featured_product->title }}</h6>
                                        </a>
                                        @if($featured_product->sale_price != '')
                                        <h5><del>{{ getSiteData('site_currency').$featured_product->regular_price }}</del></h5>
                                        <h4>{{ getSiteData('site_currency').$featured_product->sale_price }}</h4>
                                        @else
                                        <h4>{{ getSiteData('site_currency').$featured_product->regular_price }}</h4>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="best-sellers" class="tab-content">
                            <div class="no-slider row">
                                @foreach($best_sellers as $best_seller)
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            @if($best_seller->is_new_product == 1)
                                            <span class="lable3">new</span>
                                            @endif
                                            @if($best_seller->sale_price != '')
                                            <span class="lable4">on sale</span>
                                            @endif
                                        </div>
                                        @php $imgs = json_decode($best_seller->images); @endphp
                                        @if(array_key_exists(0,$imgs))
                                        <div class="front">
                                            <a href="{{ product_url($best_seller->alias) }}"><img src="{{ url('public/assets/images/products/'.$imgs[0]) }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                        </div>
                                        @endif
                                        @if(array_key_exists(1,$imgs))
                                        <div class="back">
                                            <a href="{{ product_url($best_seller->alias) }}"><img src="{{ url('public/assets/images/products/'.$imgs[1]) }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                        </div>
                                        @endif
                                        <div class="cart-info cart-wrap">
                                            <a href="javascript:void(0)" onclick="addToCartSingle('{{Crypt::encryptString($best_seller->id) }}')">
                                                <i class="ti-shopping-cart"></i>
                                            </a>
                                            @auth
                                            <a href="javascript:void(0)" onclick="addToWishlistSingle('{{Crypt::encryptString($best_seller->id) }}')">
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
                                        <div class="rating">{!! product_rating($best_seller->id) !!}</div>
                                        <a href="{{ product_url($best_seller->alias) }}">
                                            <h6>{{ $best_seller->title }}</h6>
                                        </a>
                                        @if($best_seller->sale_price != '')
                                        <h5><del>{{ getSiteData('site_currency').$best_seller->regular_price }}</del></h5>
                                        <h4>{{ getSiteData('site_currency').$best_seller->sale_price }}</h4>
                                        @else
                                        <h4>{{ getSiteData('site_currency').$best_seller->regular_price }}</h4>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Tab product end -->

<!-- service layout -->
<div class="container">
    <section class="service border-section small-section">
        <div class="row">
            @foreach ($services as $service)
            <div class="col-md-4 service-block">
                <div class="media">
                    {!! $service->icon !!}
                    <div class="media-body">
                        <h4>{{ $service->title }}</h4>
                        <p>{{ $service->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
<!-- service layout  end -->

<!-- blog section -->
<div class="container">
    <div class="row">
        <div class="col">
            <div class="title1 section-t-space">
                <h4>Recent Story</h4>
                <h2 class="title-inner1">from the blog</h2>
            </div>
        </div>
    </div>
</div>
<section class="blog section-b-space p-t-0 ratio2_3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="slide-3 no-arrow">
                    @foreach ($blogs as $blog)
                    <div class="col-md-12">
                        <a href="{{ url('/blog/'.$blog->alias) }}">
                            <div class="classic-effect">
                                <div>
                                    <img src="{{ url('/public/assets/images/blog/'.$blog->image) }}" class="img-fluid blur-up lazyload bg-img" alt="{{ $blog->title }}">
                                </div>
                                <span></span>
                            </div>
                        </a>
                        <div class="blog-details">
                            <h4>25 January 2018</h4>
                            <a href="{{ url('/blog/'.$blog->alias) }}">
                                <p>{{ $blog->title }}</p>
                            </a>
                            <hr class="style1">
                            <h6>by: {{ get_author_name($blog->post_by) }} , {{ get_post_no_comment($blog->id) }} Comment</h6>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog section end -->
@endsection