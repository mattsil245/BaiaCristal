@extends('layouts.app')

@section('title', 'Carrinho')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">🛒 Seu Carrinho</h1>

    @php
        $total = 0;
    @endphp

    @if(count($carrinho) > 0)
        <div class="row">
            @foreach($carrinho as $item)
                @php
                    $subtotal = $item['preco'] * $item['quantidade'];
                    $total += $subtotal;
                @endphp

                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if(isset($item['imagem']))
                            <img src="{{ asset('imagens/produtos/' . $item['imagem']) }}" class="card-img-top" alt="{{ $item['nome'] }}">
                        @endif
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title">{{ $item['nome'] }}</h5>

                            <div class="d-flex align-items-center mb-2">
                                <form action="{{ route('carrinho.atualizar', $item['id']) }}" method="POST" class="d-flex align-items-center me-2">
                                    @csrf
                                    <input type="hidden" name="tipo" value="diminuir">
                                    <button type="submit" class="btn btn-sm btn-outline-secondary">−</button>
                                </form>

                                <span class="mx-2 fw-bold">{{ $item['quantidade'] }}</span>

                                <form action="{{ route('carrinho.atualizar', $item['id']) }}" method="POST" class="d-flex align-items-center ms-2">
                                    @csrf
                                    <input type="hidden" name="tipo" value="aumentar">
                                    <button type="submit" class="btn btn-sm btn-outline-secondary">+</button>
                                </form>
                            </div>

                            <p class="card-text mb-1">Preço unitário: <strong>R$ {{ number_format($item['preco'], 2, ',', '.') }}</strong></p>
                            <p class="card-text text-primary">Subtotal: <strong>R$ {{ number_format($subtotal, 2, ',', '.') }}</strong></p>
                        </div>

                        <div class="card-footer bg-white border-top-0 d-flex justify-content-between align-items-center">
                            <form action="{{ route('carrinho.remover', $item['id']) }}" method="POST" class="m-0">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i> Remover
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Total Geral -->
        <div class="text-end mt-4">
            <h4 class="fw-bold">Total: R$ {{ number_format($total, 2, ',', '.') }}</h4>
            <a href="/checkout" class="btn btn-success btn-lg mt-2">
                Finalizar Compra
            </a>
        </div>
    @else
        <div class="alert alert-info text-center" role="alert">
            Seu carrinho está vazio. 🛍
        </div>
    @endif
</div>
@endsection
