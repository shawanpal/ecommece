<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
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

}
