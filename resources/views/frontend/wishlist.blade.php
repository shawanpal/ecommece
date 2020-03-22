@extends('frontend.layout')

@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>wishlist</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">wishlist</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section class="wishlist-section section-b-space">
    @auth
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table cart-table table-responsive-xs table-wishlist">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">availability</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($wishlists as $wishlist)
                        @php
                            $imgs = json_decode($wishlist->images);
                            $firstimg = $imgs[0];
                            $enc = Crypt::encryptString($wishlist->wishlist_id);
                        @endphp
                        <tr data-id="{{ $enc }}">
                            <td>
                                <a href="{{ url('/shop/product/'.$wishlist->alias) }}"><img src="{{ url('public/assets/images/products/'.$firstimg) }}" alt="{{ $firstimg }}"></a>
                            </td>
                            <td><a href="{{ url('/shop/product/'.$wishlist->alias) }}">{{ $wishlist->title }}</a>
                                <div class="mobile-cart-content row">
                                    <div class="col-xs-3">
                                        @if($wishlist->stock > 0)
                                        <p>in stock</p>
                                        @else
                                        <p class="oos">out of stock</p>
                                        @endif
                                    </div>
                                    <div class="col-xs-3">
                                        @if($wishlist->sale_price != '')
                                        <h2 class="td-color">{{ getSiteData('site_currency').$wishlist->sale_price }}</h2>
                                        @else
                                        <h2 class="td-color">{{ getSiteData('site_currency').$wishlist->regular_price }}</h2>
                                        @endif
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="td-color"><a href="#" class="icon mr-1"><i class="ti-close"></i>
                                            </a><a href="#" class="cart"><i class="ti-shopping-cart"></i></a></h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($wishlist->sale_price != '')
                                <h2>{{ getSiteData('site_currency').$wishlist->sale_price }}</h2>
                                @else
                                <h2>{{ getSiteData('site_currency').$wishlist->regular_price }}</h2>
                                @endif
                            </td>
                            <td>
                                @if($wishlist->stock > 0)
                                <p>in stock</p>
                                @else
                                <p class="oos">out of stock</p>
                                @endif
                            </td>
                            <td><a onclick="removeFromWishlist('{{ $enc }}')" class="icon mr-3"><i class="ti-close"></i> </a><a onclick="cartFromWishlist('{{ $enc }}')" class="cart"><i class="ti-shopping-cart"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row wishlist-buttons">
            <div class="col-12"><a href="{{ url('/') }}" class="btn btn-solid">continue shopping</a> <a href="{{ url('/checkout') }}" class="btn btn-solid">check out</a></div>
        </div>
    </div>
    @endauth
    @guest
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <a href="{{ url('/login') }}" class="btn btn-solid">Login to view wishlist</a>
            </div>
        </div>
    </div>
    @endguest
</section>
<!-- Section ends -->
@endsection
