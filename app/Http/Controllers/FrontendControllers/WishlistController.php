<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Wishlist;

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
    }
    
    public function cartWishproduct(Request $request) {
        
        echo \Request::getClientIp(true);
        
    }

}
