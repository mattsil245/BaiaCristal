@extends('layouts.adm')

@section('title', 'Home - Adm')

@section('content')
<h1>Contatos</h1>

<form action="{{ url('/admin/categoria/criar-categoria') }}" method="post">
    @csrf

    <div class="mb-3">
        <label for="categoria" class="form-label">Categoria</label>
        <input type="text" class="form-control" name="categoria" id="categoria">
    </div>

    <div>
        <button type="submit" class="btn btn-primary">ENVIAR</button>
    </div>
</form>
@endsection
