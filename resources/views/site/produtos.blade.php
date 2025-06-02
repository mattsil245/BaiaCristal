@extends('layouts.app')

@section('title', 'Produtos')

@section('content')

<style>
    .container-produtos {
        min-height: 100vh;
        width: 100%;
        display: flex;
        align-items: center;
        flex-direction: column;
        gap: 2rem;
        padding: 2rem;
    }
    .titulo {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .listasProdutos {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    @media (min-width: 600px) {
        .listasProdutos {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 900px) {
        .listasProdutos {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    .cardProdutos {
        background-color: #BBFFD9;
        width: 100%;
        max-width: 300px;
        border-radius: 1rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 1rem;
        gap: 1rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transition: transform 0.2s;
        cursor: pointer;
    }
    .cardProdutos:hover {
        transform: translateY(-5px);
    }
    .cardImagem img {
        max-width: 100%;
        height: auto;
        border-radius: 1rem;
    }
    .nomeProduto {
        font-size: 1.2rem;
        font-weight: bold;
        text-align: center;
    }
    .link-produto {
        text-decoration: none;
        color: inherit;
    }
</style>

<div class="container-produtos">
    <h1 class="titulo">Produtos</h1>

    <div class="listasProdutos">
        @foreach($produtos as $produto)
            <a href="{{ url('produto/' . $produto->id) }}" class="link-produto">
                <div class="cardProdutos">
                    <div class="cardImagem">
                        <img src="{{ asset('imagens/produtos/' . $produto->imagem) }}" alt="{{ $produto->nome }}">
                    </div>
                    <div class="nomeProduto">
                        {{ strtoupper($produto->nome) }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

@endsection
