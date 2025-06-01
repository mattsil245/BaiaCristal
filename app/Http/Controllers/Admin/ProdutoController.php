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
        //
        $produtos = Produto::all();
        return view('admin.produto.index')->with('produtos',$produtos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = Categoria::all();
        return view('admin.produto.create')->with('categorias', $categorias);
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
        $produto = new Produto();
        
        $produto->nome = $request->nome;
        $produto->id_categoria = $request->id_categoria;
        $produto->preco = $request->preco;
        $produto->desc = $request->desc;
        // $produto->imagem = $request->imagem;
        $produto->status = 1;

        // Verifica se uma imagem foi enviada
    if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
        $imagem = $request->file('imagem');
        $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension(); // Ex: 1623345543.jpg
        $caminho = $imagem->storeAs('produtos', $nomeImagem, 'public'); // Salva em storage/app/public/produtos

        $produto->imagem = $caminho; // Salva caminho no banco, ex: "produtos/1623345543.jpg"
    }   

        $produto->save();

        return redirect()->route('admin.produto.index');

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
    
        // Se houver uma nova imagem
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $imagem = $request->file('imagem');
            $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();
            $caminho = $imagem->storeAs('produtos', $nomeImagem, 'public');
    
            // Opcional: apagar imagem antiga se quiser
            if ($produto->imagem && \Storage::disk('public')->exists($produto->imagem)) {
                \Storage::disk('public')->delete($produto->imagem);
            }
    
            $produto->imagem = $caminho;
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
        //
    }
}
