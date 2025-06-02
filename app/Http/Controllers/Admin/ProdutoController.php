<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::with('categoria')->get(); // carrega produtos com suas categorias
        return view('admin.produto.index')->with('produtos', $produtos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create()
{
    $categorias = Categoria::all();
    return view('admin.produto.create', compact('categorias'));
}



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $produto = new Produto;
    $produto->nome = $request->nome;
    $produto->id_categoria = $request->id_categoria;
    $produto->preco = $request->preco;
    $produto->desc = $request->desc;
    $produto->status = $request->status;

    if ($request->hasFile('imagem')) {
        $nomeImagem = time() . '.' . $request->imagem->extension();
        $request->imagem->move(public_path('imagens/produtos'), $nomeImagem);
        $produto->imagem = $nomeImagem;
    }

    $produto->save();

    return redirect()->route('admin.produto.index')->with('success', 'Produto cadastrado com sucesso!');
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
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::all();
    
        return view('admin.produto.edit', compact('produto', 'categorias'));
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
        $produto = Produto::findOrFail($id);
    
        $produto->nome = $request->nome;
        $produto->id_categoria = $request->id_categoria;
        $produto->preco = $request->preco;
        $produto->desc = $request->desc;
    
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $imagem = $request->file('imagem');
            $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();
            $imagem->move(public_path('imagens/produtos'), $nomeImagem);
            $produto->imagem = $nomeImagem;
        }
        
    
        $produto->save();
    
        return redirect()->route('admin.produto.index')->with('success', 'Produto atualizado com sucesso.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function destroy($id)
{
    $produto = Produto::findOrFail($id);
    $produto->delete();

    return redirect()->route('admin.produto.index')->with('success', 'Produto excluído com sucesso!');
}
}
