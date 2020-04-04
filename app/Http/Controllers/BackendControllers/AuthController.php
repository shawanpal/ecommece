<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller {
    
    public function login() {
        return view('backend.login');
    }
}
