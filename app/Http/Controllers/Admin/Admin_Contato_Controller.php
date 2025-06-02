<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contato;

class Admin_Contato_Controller extends Controller
{
    
    public function index()
    {
        $contatos = Contato::all();
        return view('admin.contato.index', compact('contatos'));
    }
}