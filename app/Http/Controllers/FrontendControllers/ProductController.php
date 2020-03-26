<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller {

    public function singleProduct($alias) {
        $data['product'] = Product::where(['alias' => $alias, 'is_active' => 1, 'is_deleted' => 0])
                ->first();
        if (empty($data['product'])) {
            return view('frontend.404');
        } else {
            return view('frontend.product', $data);
        }
    }

    public function addToCart(Request $request) {

        $product_id = Crypt::decryptString($request->input('encID'));
        $variation_color = $request->input('variation_color');
        $variation_size = $request->input('variation_size');
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
                    'variation' => '',
                    'cart_from' => 'wishlist',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

}
