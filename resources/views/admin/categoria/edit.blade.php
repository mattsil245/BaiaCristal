@extends('layouts.adm')

@section('title', 'Editar Categoria - Adm')

@section('content')
<h1>Editar Categoria</h1>

<form action="{{ route('admin.categoria.update', $categoria->id) }}" method="post">
    @csrf
    @method('PUT') <!-- ou PATCH -->
    <div class="mb-3">
        <label for="categoria" class="form-label">Categoria</label>
        <input type="text" class="form-control" name="categoria" id="categoria" value="{{ old('categoria', $categoria->categoria) }}">
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </div>
</form>
@endsection
