<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {

    protected function validator(array $data) {
        return Validator::make($data, [
                    'first_name' => ['required', 'string'],
                    'last_name' => ['required', 'string'],
                    'email' => ['required', 'email', 'unique:users'],
                    'password' => ['required', 'min:8'],
        ]);
    }

    public function userRegister(Request $request) {
        $validator = $this->validator($request->input());
        dd($request->input());
    }

}
