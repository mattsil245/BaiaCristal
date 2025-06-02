@extends('layouts.app')

@section('title', 'Produto')

@section('content')
<style>
    * {
        box-sizing: border-box;
    }

    .container-produto {
        min-height: 50vh;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 1.5rem;
        padding: 2rem;
    }

    .titulo {
        text-align: center;
    }

    .imgProduto {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .imgProduto img {
        max-width: 70%;
        height: auto;
        border-radius: 1rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }

    .card-produto {
        background-color: #d4ffbb;
        width: 100%;
        max-width: 40rem;
        border-radius: 1.5rem;
        padding: 2rem;
        display: flex;
        flex-direction: column;
        gap: 1.2rem;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .nomeProduto {
        font-size: 1.8rem;
        font-weight: bold;
        text-align: center;
        color: #222;
    }

    .alinha {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    .preco {
        font-size: 1.4rem;
        font-weight: 600;
        color: #28a745;
        background-color: #e9ffe4;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
    }

    .favoritar img {
        cursor: pointer;
        width: 2rem;
        transition: transform 0.3s ease;
    }

    .favoritar img:hover {
        transform: scale(1.2);
    }

    .btnProduto {
        background-color: #28a745;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 0.75rem;
        font-weight: 600;
        text-align: center;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.3s ease, transform 0.2s ease;
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
    }

    .btnProduto:hover {
        background-color: #218838;
        transform: scale(1.02);
    }
</style>

<div class="container-produto">
    <div class="titulo">
        <h1>Produto</h1>
    </div>

    <div class="imgProduto">
        <img src="{{ asset('imagens/produtos/' . $produto->imagem) }}" alt="{{ $produto->nome }}">
    </div>

    <div class="card-produto">
        <div class="nomeProduto">{{ strtoupper($produto->nome) }}</div>

        <div class="alinha">
            <div class="preco">
                R$ {{ number_format($produto->preco, 2, ',', '.') }}
            </div>
            <div class="favoritar">
                <img src="{{ asset('img/favorito.png') }}" alt="Favoritar">
            </div>
        </div>

        <div class="btnProduto">Pedir</div>
    </div>
</div>
@endsection
