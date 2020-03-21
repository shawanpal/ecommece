<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller {

    protected function validator(array $data) {
        return Validator::make($data, [
                    'email' => ['required', 'email'],
                    'password' => ['required'],
        ]);
    }

    public function userlogin(Request $request) {
        $validator = $this->validator($request->input());
        dd($validator);
    }

}
