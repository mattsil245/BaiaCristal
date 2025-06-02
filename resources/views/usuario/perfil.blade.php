@extends('layouts.app') {{-- ou substitua pelo seu layout padrão --}}

@section('content')
<div class="container mt-4">
  <h2>Perfil do Usuário</h2>

  <div class="card">
    <div class="card-body">
      <p><strong>Nome:</strong> {{ $usuario->name }}</p>
      <p><strong>Email:</strong> {{ $usuario->email }}</p>
      {{-- Adicione mais campos se quiser --}}
    </div>
  </div>
</div>
@endsection
