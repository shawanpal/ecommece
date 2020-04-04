<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
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
        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');
            $credentials = array('email' => $email, 'password' => $password, 'is_active' => 1, 'is_deleted' => 0);

            if (Auth::attempt($credentials)) {
                return Redirect('/');
            } else {
                return Redirect::back()->with('error', 'Wrong Credientials!');
            }
        }
    }

    public function adminLogin(Request $request) {
        $validator = $this->validator($request->input());
        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');
            $credentials = array('role' => 1, 'email' => $email, 'password' => $password, 'is_active' => 1, 'is_deleted' => 0);

            if (Auth::attempt($credentials)) {
                return Redirect('/site-admin/dashboard');
            } else {
                return Redirect::back()->with('error', 'Wrong Credientials!');
            }
        }
    }

}
