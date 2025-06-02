@extends('layouts.adm')

@section('title', 'Contato')

@section('content')

<div class="container mt-4">
    <h2>Contatos Recebidos</h2>

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Assunto</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contatos as $contato)
                <tr>
                    <td>{{ $contato->id }}</td>
                    <td>{{ $contato->nome }}</td>
                    <td>{{ $contato->email }}</td>
                    <td>{{ $contato->assunto }}</td>
                    <td>
                        <!-- Botão para abrir modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalContato{{ $contato->id }}">
                            Ver detalhes
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalContato{{ $contato->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $contato->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel{{ $contato->id }}">Detalhes do Contato #{{ $contato->id }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Nome:</strong> {{ $contato->nome }}</p>
                                        <p><strong>Email:</strong> {{ $contato->email }}</p>
                                        <p><strong>Assunto:</strong> {{ $contato->assunto }}</p>
                                        <p><strong>Mensagem:</strong><br>{{ $contato->mensagem }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fim Modal -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
