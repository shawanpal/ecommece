<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use App\Collection;
use App\Product;
use App\Special;
use App\Service;
use App\Blog;

class HomeController extends Controller {

    public function index() {
        $data['sliders'] = Slider::all();
        $data['services'] = Service::all();
        $data['collections'] = Collection::all();
        $data['blogs'] = Blog::limit(10)
                ->get();
        $data['collection_products'] = Product::where(['is_top_collection' => 1, 'is_active' => 1, 'is_deleted' => 0])
                ->get();
        $data['special'] = Special::first();
        $data['new_products'] = Product::where(['is_new_product' => 1, 'is_active' => 1, 'is_deleted' => 0])
                ->limit(8)
                ->get();
        $data['featured_products'] = Product::where(['is_featured' => 1, 'is_active' => 1, 'is_deleted' => 0])
                ->limit(8)
                ->get();
        $data['best_sellers'] = Product::where(['is_best_seller' => 1, 'is_active' => 1, 'is_deleted' => 0])
                ->limit(8)
                ->get();
        return view('frontend.homepage', $data);
    }

}
