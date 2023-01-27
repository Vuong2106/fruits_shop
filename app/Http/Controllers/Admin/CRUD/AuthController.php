<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {

        if ($request->getMethod() == 'GET') {
            if (Auth::check()) {
                return redirect()->route('admin.dashboard');
            } else {
                return view('admin.pages.login');
            }
        }
        // dd($request->all());

        $credentials = $request->only(['username', 'password']);
        if (!Auth::guard('web')->attempt($credentials)) {
            return redirect()->back()->withInput($request->input())->withErrors(['message' => 'Tên đăng nhập hoặc mật khẩu không đúng']);
        } else {
            return redirect()->back()->withInput($request->input())->withErrors(['message' => 'Tên đăng nhập hoặc mật khẩu không đúng']);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function registerS(Request $request)
    {

        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email
        ]);

        return redirect()->back()->with('success', 'Tạo mới tài khoản thành công');
    }
}
