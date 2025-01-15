<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request){

        $credentials = $request->validate([
            'email' =>['required','email'],
            'password'=>['required', 'string']
        ]);

        if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); // セッションIDを再生成
        return redirect()->route('user.home');// ログイン後のリダイレクト先
        }

        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが正しくありません。',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); // セッションを無効化
        $request->session()->regenerateToken(); // CSRFトークンを再生成
        return redirect('login');
    }

    // 新規登録フォームの表示
    public function showRegisterForm()
    {
        return view('register'); // register.blade.php を表示
    }

    public function register(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);

        return redirect()->route('login')->with('success', '登録が完了しました！');
    }


}
