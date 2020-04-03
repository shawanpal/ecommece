<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Blog;
use App\Comment;

class BlogController extends Controller {

    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => ['required'],
                    'email' => ['required', 'email'],
                    'comment' => ['required'],
                    'enc' => ['required']
        ]);
    }

    public function blogDetails($alias) {
        $data['blog'] = Blog::where(['alias' => $alias, 'is_active' => 1, 'is_deleted' => 0])
                ->first();
        $data['comments'] = Comment::where(['post_id' => $data['blog']->id, 'is_approved' => 1])
                ->get();
        if (empty($data['blog'])) {
            return view('frontend.404');
        } else {
            return view('frontend.blogdetails', $data);
        }
    }

    public function postComment(Request $request) {
        $validator = $this->validator($request->input());
        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $post_id = Crypt::decryptString($request->input('enc'));
            Comment::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'comment' => $request->input('comment'),
                'post_id' => $post_id,
                'is_approved' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return Redirect::back()
                    ->with('success', 'You comment will be publish after verification !');
        }
    }

}
