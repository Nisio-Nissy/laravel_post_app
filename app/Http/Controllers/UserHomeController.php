<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;

class UserHomeController extends Controller
{
    public function index(Request $request)
    {
        // ログインユーザー情報をビューに渡す
        $posts = Post::all();
        return view('user.home', compact('posts'));
    }
}
