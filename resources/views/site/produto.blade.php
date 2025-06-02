@extends('layouts.app')

@section('title', 'Produto')

@section('content')
<style>

    *{
        box-sizing:border-box ;
    }
    .container-produto {
        min-height: 40vh;
        max-width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        padding: 1rem;
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
        max-width: 50%;
        height: 50%;
        border-radius: 1rem;
    }
       .card-produto {
        background-color:rgb(174, 255, 193);
        width: 100%;
        max-width: 39rem;
        border-radius: 1.5rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 1.5rem;
        gap: 1.5rem;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
  
    .card-produto:hover {
        transform: translateY(-5px);
    }

    .nomeProduto {
        font-size: 1.8rem;
        font-weight: 700;
        color: #222;
        text-align: center;
    }
    .alinha {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        padding: 0 0.5rem;
    }
    .preco {
        align-items: center;
        justify-content: center;
        display: flex;
        font-size: 1.4rem;
        font-weight: 600;
        color: #28a745;
        background-color:rgb(221, 255, 224);
        border-radius: 0.5rem;
        width: 100%;
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
        cursor: pointer;
        text-align: center;
        width: 100%;
        font-weight: 600;
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
        <div class="alinha">
        <div class="nomeProduto">{{ strtoupper($produto->nome) }}</div>

        <div class="favoritar">
                <img src="{{ asset('img/favorito.png') }}" alt="Favoritar">
            </div>

        </div>
            <div class="preco">
                R$ {{ number_format($produto->preco, 2, ',', '.') }}
            </div>
            
        

        <div class="btnProduto" onclick="adicionarAoCarrinho({{ $produto->id }})">
            Pedir
        </div>  

    </div>
</div>
<script>
    function adicionarAoCarrinho(produtoId) {
        fetch('/carrinho/adicionar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ produto_id: produtoId })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert('Produto adicionado ao carrinho!');
                // opcional: atualizar ícone/contador do carrinho
            } else {
                alert('Erro ao adicionar ao carrinho.');
            }
        })
        .catch(err => {
            console.error(err);
            alert('Erro ao adicionar ao carrinho.');
        });
    }
</script>

@endsection
