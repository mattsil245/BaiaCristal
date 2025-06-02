@extends('layouts.adm')

@section('title', 'Editar Produto')

@section('content')
<div class="container mt-5">
    <h1>Editar Produto</h1>

    <form action="{{ route('admin.produto.update', $produto->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT') {{-- método PUT para update --}}

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="{{ $produto->nome }}" required>
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="text" class="form-control" name="preco" id="preco" value="{{ $produto->preco }}" required>
        </div>

        <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoria</label>
            <select name="id_categoria" class="form-select" id="id_categoria" required>
                @foreach($categorias as $c)
                    <option value="{{ $c->id }}" {{ $produto->id_categoria == $c->id ? 'selected' : '' }}>
                        {{ $c->categoria }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="desc" class="form-label">Descrição</label>
            <textarea class="form-control" name="desc" id="desc" rows="4" required>{{ $produto->desc }}</textarea>
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem Atual</label><br>
            @if ($produto->imagem)
            <img src="{{ asset('imagens/produtos/' . $produto->imagem) }}" alt="{{ $produto->nome }}" width="150" class="mb-2">
            @else
                <p>Sem imagem.</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Nova Imagem (opcional)</label>
            <input type="file" class="form-control" name="imagem" id="imagem" accept="image/*">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Salvar Alterações</button>
            <a href="{{ route('admin.produto.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
