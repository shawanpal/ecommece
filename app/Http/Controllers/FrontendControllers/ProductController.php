<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Wishlist;
use App\Attribute;

class ProductController extends Controller {

    public function singleProduct($alias) {

        $data['product'] = Product::where(['alias' => $alias, 'is_active' => 1, 'is_deleted' => 0])
                ->first();

        $product_category = Attribute::where(["product_id" => $data['product']->id, "name" => "categories"])
                ->first();
        if (!empty($product_category)) {
            $product_category = json_decode($product_category->value);

            $get_all_categories = Attribute::where(["name" => "categories"])
                    ->get();
            $related_array = [];
            foreach ($get_all_categories as $get_all_category) {
                $categories = json_decode($get_all_category->value);
                if (in_array($product_category[0], $categories)) {
                    array_push($related_array, $get_all_category->product_id);
                }
            }
            $data['related_products'] = [];

            foreach ($related_array as $relatedp) {
                if ($relatedp != $data['product']->id) {
                    $product = Product::where(['id' => $relatedp, 'is_active' => 1, 'is_deleted' => 0])
                            ->first();
                    if (!empty($product)) {
                        array_push($data['related_products'], $product);
                    }
                }
            }
        }
        if (empty($data['product'])) {
            return view('frontend.404');
        } else {
            return view('frontend.product', $data);
        }
    }

    public function addToCart(Request $request) {

        $product_id = Crypt::decryptString($request->input('encID'));
        $quantity = $request->input('quantity');
        $variation_color = $request->input('variation_color');
        $variation_size = $request->input('variation_size');
        $variation = json_encode(array($variation_color, $variation_size));

        if (Auth::check()) {
            $userID = Auth::User()->id;
        } else {
            $userID = '';
        }
        $ip = $request->ip();
        $addtocart = Cart::create([
                    'product_id' => $product_id,
                    'user_id' => $userID,
                    'quantity' => $quantity,
                    'ip' => $ip,
                    'variation' => $variation,
                    'cart_from' => 'product',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
        ]);
        $product = Product::where(['id' => $product_id])
                ->first();
        $imgs = json_decode($product->images);
        $firstimg = $imgs[0];
        $model = '<a href="#">
                    <img class="img-fluid blur-up lazyload pro-img" src="' . url('public/assets/images/products/' . $firstimg) . '" alt="">
                </a>
                <div class="media-body align-self-center text-center">
                    <a>
                        <h6>
                            <i class="fa fa-check"></i>Item <span>' . $product->title . '</span> <span> successfully added to your Cart</span>
                        </h6>
                    </a>
                    <div class="buttons">
                        <a href="' . url('/cart') . '" class="view-cart btn btn-solid">Your cart</a>
                        <a href="' . url('/') . '" class="continue btn btn-solid">Continue shopping</a>
                    </div>
                    <div class="upsell_payment">
                        <img src="' . url('public/assets/images/' . getSiteData('cart_payment')) . '" class="img-fluid blur-up lazyload" alt="">
                    </div>
                </div>';
        echo $model;
    }

    public function addToWishlist(Request $request) {
        if (Auth::check()) {
            $userID = Auth::User()->id;
            $product_id = Crypt::decryptString($request->input('encID'));
            $addtowishlist = Wishlist::create([
                        'user_id' => $userID,
                        'product_id' => $product_id,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
            ]);
            echo 1;
        } else {
            echo 0;
        }
        die();
    }

    public function addToCartSingle(Request $request) {

        $product_id = Crypt::decryptString($request->input('encID'));
        $variation = '';
        if (Auth::check()) {
            $userID = Auth::User()->id;
        } else {
            $userID = '';
        }
        $ip = $request->ip();
        $addtocart = Cart::create([
                    'product_id' => $product_id,
                    'user_id' => $userID,
                    'quantity' => 1,
                    'ip' => $ip,
                    'variation' => $variation,
                    'cart_from' => 'product',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
        ]);
        $product = Product::where(['id' => $product_id])
                ->first();
        $imgs = json_decode($product->images);
        $firstimg = $imgs[0];
        $model = '<a href="#">
                    <img class="img-fluid blur-up lazyload pro-img" src="' . url('public/assets/images/products/' . $firstimg) . '" alt="">
                </a>
                <div class="media-body align-self-center text-center">
                    <a>
                        <h6>
                            <i class="fa fa-check"></i>Item <span>' . $product->title . '</span> <span> successfully added to your Cart</span>
                        </h6>
                    </a>
                    <div class="buttons">
                        <a href="' . url('/cart') . '" class="view-cart btn btn-solid">Your cart</a>
                        <a href="' . url('/') . '" class="continue btn btn-solid">Continue shopping</a>
                    </div>
                    <div class="upsell_payment">
                        <img src="' . url('public/assets/images/' . getSiteData('cart_payment')) . '" class="img-fluid blur-up lazyload" alt="">
                    </div>
                </div>';
        echo $model;
    }

    public function addToWishlistSingle(Request $request) {
        if (Auth::check()) {
            $userID = Auth::User()->id;
            $product_id = Crypt::decryptString($request->input('encID'));
            $addtowishlist = Wishlist::create([
                        'user_id' => $userID,
                        'product_id' => $product_id,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
            ]);
            echo 1;
        } else {
            echo 0;
        }
        die();
    }

    public function quickView(Request $request) {

        $product_id = Crypt::decryptString($request->input('encID'));
        $product = Product::where(['id' => $product_id])
                ->first();
        $imgs = json_decode($product->images);

        $modal_body = '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="row">
                            <div class="col-lg-6 col-xs-12">
                                <div class="quick-view-img"><img src="' . url('public/assets/images/products/' . $imgs[0]) . '" alt="" class="img-fluid blur-up lazyload"></div>
                            </div>
                            <div class="col-lg-6 rtl-text">
                                <div class="product-right">
                                    <h2>' . $product->title . '</h2>';
        if ($product->sale_price != '') {
            $modal_body .= '<h4><del>' . getSiteData('site_currency') . $product->regular_price . '</del></h4>';
            $modal_body .= '<h3>' . getSiteData('site_currency') . $product->sale_price . '</h3>';
        } else {
            $modal_body .= '<h3>' . getSiteData('site_currency') . $product->regular_price . '</h3>';
        }
        $variations = getProductData($product->id, 'variations');
        if (!empty($variations)) {
            $variations = json_decode($variations);
            $modal_body .= '<ul class="color-variant">';
            foreach ($variations as $variation) {
                if ($variation->variations_id == 1) {
                    if ($variation->variations_cost == 0) {
                        $active = 'selected';
                        $modal_body .= '<input type="hidden" name="variation_color" value="' . $variation->variations_value . '">';
                    } else {
                        $active = '';
                    }
                    $modal_body .= ' <li id="' . $variation->variations_value . '" class="' . $active . '" style="background: ' . $variation->variations_value . '" data-price="' . $variation->variations_cost . '"></li>';
                }
            }
            $modal_body .= '</ul>';
        }
        if (getProductData($product->id, 'short_description') != '') {
            $modal_body .= '<div class="border-product">
                            <h6 class="product-title">product details</h6>';
                            getProductData($product->id , 'short_description');
            $modal_body .= '</div>';
        }
        $modal_body .= ' <div class="product-description border-product">
                            <div class="size-box">';
        if (!empty($variations)) {
            $modal_body .= '<ul>';
            foreach ($variations as $variation) {
                if ($variation->variations_id == 2) {
                    if ($variation->variations_cost == 0) {
                        $active = 'active';
                        $modal_body .= '<input type="hidden" name="variation_size" value="' . $variation->variations_value . '">';
                    } else {
                        $active = '';
                    }
                    $modal_body .= ' <li id="' . $variation->variations_value . '" class="' . $active . '" data-price="' . $variation->variations_cost . '"><a>' . $variation->variations_value . '</a></li>';
                }
            }

            $modal_body .= '</ul>';
        }
        $modal_body .= ' </div>
                        <h6 class="product-title">quantity</h6>
                        <div class="qty-box">
                            <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-angle-left"></i></button> </span>
                            <input type="text" name="quantity" class="form-control input-number" value="1"> <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span></div>
                        </div>
                    </div>
                    <input type="hidden" name="enc_id" value="'.Crypt::encryptString($product->id).'">
                    <input type="hidden" name="base_url" value="'. url('/').'">
                    <div class="product-buttons"><a onclick="addToCart()" class="btn btn-solid">add to cart</a> <a href="'.product_url($product->alias).'" class="btn btn-solid">view detail</a></div>
                </div>
            </div>
        </div>';
        echo $modal_body;
        die();
    }

}
