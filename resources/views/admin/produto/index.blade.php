@extends('layouts.adm')

@section('title', 'Home - Adm')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-semibold">Lista de Produtos</h3>
            <a class="btn btn-success px-3" role="button" href="{{ route('admin.produto.create') }}">
                <i class="fas fa-plus me-1" aria-hidden="true"></i> Novo Produto
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Status</th>
                    <th scope="col">Alterar</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->nome }}</td>
                    <td>{{ $p->categoria->categoria ?? 'Sem categoria' }}</td>
                    <td>R$ {{ number_format($p->preco, 2, ',', '.') }}</td>
                    <td>{{ $p->status ? 'Ativo' : 'Inativo' }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.produto.edit', $p->id) }}">
                            <i class="fas fa-edit fa-lg text-secondary"></i>
                        </a>
                    </td>
                <td class="text-center">
                    <form action="{{ route('admin.produto.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn p-0 border-0 bg-transparent">
                            <i class="fas fa-trash-alt fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
