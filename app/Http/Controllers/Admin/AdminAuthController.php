<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'senha' => 'required'
        ]);

        $admin = Admin::where('login', $request->login)->first();

        if ($admin && Hash::check($request->senha, $admin->senha)) {
            session(['admin_logado' => $admin->id]);
            return redirect('/admin');
        }

        return back()->with('error', 'Login ou senha inválidos');
    }

    public function logout()
    {
        session()->forget('admin_logado');
        return redirect()->route('admin.login.form');
    }
}

