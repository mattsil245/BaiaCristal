@extends('layouts.adm')

@section('title', 'Criar Produto')

@section('content')
<div class="container mt-5">
    <h1>Criar Produto</h1>

    <form action="{{ url('/admin/produto/criar-produto') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" required>
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="text" class="form-control" name="preco" id="preco" required>
        </div>

        <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoria</label>
            <select name="id_categoria" class="form-select" id="id_categoria" required>
                @foreach($categorias as $c)
                    <option value="{{ $c->id }}">{{ $c->categoria }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="desc" class="form-label">Descrição</label>
            <textarea class="form-control" name="desc" id="desc" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="file" class="form-control" name="imagem" id="imagem" accept="image/*" required>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">ENVIAR</button>
        </div>
    </form>
</div>
@endsection
