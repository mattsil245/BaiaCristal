<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Database\QueryException;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorias = Categoria::all();
        return view('admin.categoria.index')->with('categorias',$categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $categoria = new Categoria();

        $categoria->categoria = $request->categoria;

        $categoria->save();

        return redirect()->route('admin.categoria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::where('id','=',$id)->first();
        return view('admin.categoria.edit')->with('categoria',$categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function update(Request $request, $id)
{
    // Validação simples (opcional)
    $request->validate([
        'categoria' => 'required|string|max:255'
    ]);

    // Busca a categoria pelo ID
    $categoria = Categoria::findOrFail($id);

    // Atualiza os dados
    $categoria->categoria = $request->categoria;
    $categoria->save();

    // Redireciona com mensagem de sucesso
    return redirect()->route('admin.categoria.index')->with('success', 'Categoria atualizada com sucesso!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        try {
            $categoria = Categoria::findOrFail($id);
            $categoria->delete();
    
            return redirect()->route('admin.categoria.index')->with('success', 'Categoria excluída com sucesso!');
        } catch (QueryException $e) {
            return redirect()->route('admin.categoria.index')->with('error', 'Não foi possível excluir. A categoria está vinculada a produtos cadastrados.');
        }
    }
    
}
