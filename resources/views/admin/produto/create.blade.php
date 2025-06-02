<!-- resources/views/admin/produto/create.blade.php -->

@extends('layouts.adm') <!-- Altere se estiver usando outro layout -->

@section('content')
<div class="container mt-4">
    <h2>Cadastrar Produto</h2>
    <form action="{{ url('/admin/produto/criar-produto') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" required>
        </div>

        <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoria</label>
            <select class="form-select" name="id_categoria" required>
                @foreach($categorias as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->categoria }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" class="form-control" name="preco" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="desc" class="form-label">Descrição</label>
            <textarea class="form-control" name="desc" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="file" class="form-control" name="imagem" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status">
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
