<?php
namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Site_detail as SiteDetails;

class HomeController extends Controller {
    
    public function index() {
        return view('frontend.homepage');
    }
}
