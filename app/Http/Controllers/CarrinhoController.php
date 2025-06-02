<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class CarrinhoController extends Controller
{
    public function adicionar(Request $request)
    {
        $produto = Produto::find($request->produto_id);
        if (!$produto) {
            return response()->json(['success' => false]);
        }

        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$produto->id])) {
            $carrinho[$produto->id]['quantidade']++;
        } else {
            $carrinho[$produto->id] = [
                'id' => $produto->id,
                'nome' => $produto->nome,
                'preco' => $produto->preco,
                'imagem' => $produto->imagem,
                'quantidade' => 1
            ];
        }

        session(['carrinho' => $carrinho]);

        return response()->json(['success' => true]);
    }

    public function verCarrinho()
    {
        $carrinho = session()->get('carrinho', []);
        return view('site.carrinho.index', compact('carrinho'));
    }

    public function remover($id)
    {
        $carrinho = session()->get('carrinho', []);
        unset($carrinho[$id]);
        session()->put('carrinho', $carrinho);

        return redirect()->back()->with('success', 'Item removido do carrinho.');
    }

    public function atualizarQuantidade(Request $request, $id)
    {
        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$id])) {
            if ($request->tipo === 'aumentar') {
                $carrinho[$id]['quantidade']++;
            } elseif ($request->tipo === 'diminuir') {
                $carrinho[$id]['quantidade']--;
                if ($carrinho[$id]['quantidade'] <= 0) {
                    unset($carrinho[$id]);
                }
            }
        }

        session()->put('carrinho', $carrinho);
        return redirect()->back()->with('success', 'Quantidade atualizada.');
    }


}

