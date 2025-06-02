<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsuarioPerfilController extends Controller
{
    public function index(Request $request)
    {
        $userId = session('usuario_logado');

        if (!$userId) {
            return redirect('/')->with('error', 'Você precisa estar logado.');
        }

        $usuario = User::find($userId);

        return view('usuario.perfil', compact('usuario'));
    }
}
