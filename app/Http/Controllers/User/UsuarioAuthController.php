<?php
namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Controller;

class UsuarioAuthController extends Controller
{
    public function login(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Login manual via sessão
            session(['usuario_logado' => $user->id, 'usuario_nome' => $user->name]);
            return redirect('/')->with('success', 'Login realizado com sucesso!');
        }

        return back()->with('error', 'E-mail ou senha inválidos');
    }

public function logout()
{
    session()->flush(); // Remove tudo da sessão
    return redirect('/')->with('success', 'Logout realizado com sucesso!');
}

}

