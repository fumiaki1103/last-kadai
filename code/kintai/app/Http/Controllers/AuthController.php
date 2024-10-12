<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'role' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === $request->role) {
                return redirect()->intended('home'); // ホーム画面にリダイレクト
            } else {
                Auth::logout();
                return back()->withErrors([
                    'role' => '役割が一致しません。',
                ]);
            }
        }

        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが違います。',
            'password' => 'メールアドレスまたはパスワードが違います。',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
