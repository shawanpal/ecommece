<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Product;

class ProductController extends Controller {

    public function productList() {
        $data['products'] = Product::all();
        return view('backend.productlist', $data);
    }

    public function editProduct($enc) {
        $product_id = Crypt::decryptString($enc);
        $data['product'] = Product::where(['id' => $product_id])
                ->first();
        return view('backend.editproduct', $data);
    }

}
