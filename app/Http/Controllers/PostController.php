<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    // 一覧表示
    public function index()
    {
        $posts = Post::query()->paginate(2);
        return view('user.home', compact('posts'));
    }

    // 新規投稿フォーム表示
    public function create()
    {
        return view('posts.create');
    }

    // 投稿作成処理
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('images', 'public');
        }

        Post::create($data);

        return redirect()->route('posts.index')->with('success', '投稿を作成しました。');
    }

    // 投稿詳細表示
    public function show(Post $post)
    {
        //return view('posts.show', compact('post'));
    }

    // 編集フォーム表示
    public function edit($id)
    {
        $post = Post::findOrFail($id);  
        return view('posts.edit', compact('post'));
    }

    // 投稿更新処理
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('images', 'public');
        }

        $post->update($data);

        return redirect()->route('posts.index')->with('success', '投稿を更新しました。');
    }

    // 投稿削除処理
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', '投稿を削除しました。');
    }

    public function search(Request $request)
    {
        $tag = $request->input('tag');
    
    // タグが存在する場合、関連する投稿を検索
    if ($tag) {
        // タグ検索時にページネーションを適用
        $posts = Post::whereHas('tags', function ($query) use ($tag) {
            $query->where('tags.name', 'like', '%' . $tag . '%');
        })->paginate(2);
    } else {
        // タグが指定されていない場合は全ての投稿をページネーション
        $posts = Post::paginate(2);
    }
    //dd($posts);
        // ビューに結果を渡す
        return view('user.home', compact('posts'));
    }
}

