@extends('layouts.app')

@section('title', 'Produto')

@section('content')

<style>
    .container-produto {
        min-height: 50vh;
        min-width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        padding: 2rem;
    }
    .titulo {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .imgProduto {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .imgProduto img {
        max-width: 60%;
        height: auto;
        border-radius: 1rem;
    }
    .card-produto {
        background-color: #D4FFBB;
        width: 100%;
        max-width: 30rem;
        border-radius: 1rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 1rem;
        gap: 1rem;
    }
    .nomeProduto {
        font-size: 1.2rem;
        font-weight: bold;

    }
    .alinha {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        padding: 0 0.5rem;
    }
    .preco{
        font-size: 1rem;
        font-weight: bold;
    }
    .btnProduto {
        background-color:rgb(119, 202, 71);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        cursor: pointer;
        text-align: center;
        width: 100%;
    }
    .btnProduto:hover {
        background-color:rgb(10, 121, 10);
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
    <div class="nomeProduto">
        {{ strtoupper($produto->nome) }}
    </div>

    <div class="alinha">
        <div class="preco">
            R$ {{ number_format($produto->preco, 2, ',', '.') }}
        </div>
        <div class="favoritar">
            <img src="{{ asset('img/favorito.png') }}" alt="Favoritar" width="24">
        </div>
    </div>

    <div class="btnProduto">
        Pedir
    </div>
</div>

</div>


@endsection
