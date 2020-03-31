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

}
