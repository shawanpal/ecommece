<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\User;

class RegisterController extends Controller {

    protected function validator(array $data) {
        return Validator::make($data, [
                    'first_name' => ['required', 'string'],
                    'last_name' => ['required', 'string'],
                    'email' => ['required', 'email', 'unique:users'],
                    'password' => ['required', 'min:8'],
        ]);
    }

    protected function create(array $data) {
        return User::create([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'role' => 3,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function userRegister(Request $request) {
        $validator = $this->validator($request->input());
        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        }
        $create = $this->create($request->input());
        return Redirect('login')->with('success', 'Thank you for the register, Now you are a member of Multikart!');
    }

}
