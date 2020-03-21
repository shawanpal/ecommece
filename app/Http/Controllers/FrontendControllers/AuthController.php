<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller {
    
    public function login(){
        return view('frontend.login');
    }
    public function register(){
        return view('frontend.register');
    }
}
