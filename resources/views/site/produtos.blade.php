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

    <div class="titulo">
        <h1>Lanches</h1>
    </div>
    <div class="listasProdutos">
        @for($i = 0; $i < 3; $i++)
        <a href="produto" class="link-produto">
            <div class="cardProdutos">
                <div class="cardImagem">
                    <img src="{{ asset('img/monstro.jpg') }}" alt="Descrição da imagem">
                </div>
                <div class="nomeProduto">
                    MONSTRUOSO X-TUDO
                </div>
            </div>
        </a>
        @endfor
    </div>

    <div class="titulo">
        <h1>Bebidas</h1>
    </div>
    <div class="listasProdutos">
        @for($i = 0; $i < 3; $i++)
        <a href="produto" class="link-produto">
            <div class="cardProdutos">
                <div class="cardImagem">
                    <img src="{{ asset('img/monstro.jpg') }}" alt="Descrição da imagem">
                </div>
                <div class="nomeProduto">
                    MONSTRUOSO X-TUDO
                </div>
            </div>
        </a>
        @endfor
    </div>

    <div class="titulo">
        <h1>Acompanhamento</h1>
    </div>
    <div class="listasProdutos">
        @for($i = 0; $i < 6; $i++)
        <a href="produto" class="link-produto">
            <div class="cardProdutos">
                <div class="cardImagem">
                    <img src="{{ asset('img/monstro.jpg') }}" alt="Descrição da imagem">
                </div>
                <div class="nomeProduto">
                    MONSTRUOSO X-TUDO
                </div>
            </div>
        </a>
        @endfor
    </div>

</div>

@endsection
