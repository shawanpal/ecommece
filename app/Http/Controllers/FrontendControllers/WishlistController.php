<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Wishlist;
use App\Cart;

class WishlistController extends Controller {

    public function wishlist() {
        if (Auth::check()) {
            $userID = Auth::User()->id;
            $data['wishlists'] = DB::table('wishlists')
                    ->leftJoin('products', 'wishlists.product_id', '=', 'products.id')
                    ->where('wishlists.user_id', $userID)
                    ->select('products.*', 'wishlists.id as wishlist_id')
                    ->get();
            return view('frontend.wishlist', $data);
        } else {
            return view('frontend.wishlist');
        }
    }

    public function deleteWishproduct(Request $request) {
        $wl_id = Crypt::decryptString($request->input('wl_id'));
        $delete = Wishlist::where('id', $wl_id)
                ->delete();
        echo $delete;
        die();
    }

    public function cartWishproduct(Request $request) {
        if (Auth::check()) {
            $userID = Auth::User()->id;
            $wl_id = Crypt::decryptString($request->input('wl_id'));
            $wishlist = Wishlist::where('id', $wl_id)
                    ->first();
            $product_id = $wishlist->product_id;
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
            $delete = Wishlist::where('id', $wl_id)
                ->delete();
            echo $delete;
        }
        die();
    }

}
