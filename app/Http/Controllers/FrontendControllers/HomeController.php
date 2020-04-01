<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use App\Collection;

class HomeController extends Controller {

    public function index() {
        $data['sliders'] = Slider::all();
        $data['collections'] = Collection::all();
        
        return view('frontend.homepage', $data);
    }

}
