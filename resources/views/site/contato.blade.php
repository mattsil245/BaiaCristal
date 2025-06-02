@extends('layouts.app')

@section('title', 'Contato')

@section('content')
<style>
    .container-cadastro {
        justify-content: center;

    }
    .card-cadastro{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        gap: 1rem;
    }
    .formulario{
        height: auto;
        width: 40%;
        display: flex;
        flex-direction: column;
    }
    .linha {
    display: flex;
    flex-direction: row;
    gap: 1rem;
    width: 100%;
}

.alinha {
    display: flex;
    flex-direction: column;
    flex: 1;
    height: 100%;
}
/* .form-control {
    border: 2px solid rgb(122, 122, 122);
    border-radius: 5px;
    width:100%;
    height: 2.6rem;
    padding: 6px;
    margin-top: 2rem;
    font-size: 17px;
    text-indent: 3%;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); 
}
.form-control textarea{
    height: 5rem;
} */
 .btnEnviar {
        background-color:rgb(34, 194, 119);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        cursor: pointer;
        text-align: center;
        width: 100%;
    }
    .btnEnviar:hover {
        background-color:rgb(0, 179, 90);
    }
    </style>
<div class="container-fluid d-flex align-items-center justify-content-center">
<div claass="container" style="width: 60%">
<form action="{{ route('contato.store') }}" method="post">
    @csrf
    
    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" class="form-control" name="nome" placeholder="Seu Nome" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" placeholder="name@example.com" name="email" required>
    </div>
    <div class="mb-3">
        <label for="assunto" class="form-label">Asssunto:</label>
        <input type="text" class="form-control" name="assunto" placeholder="Titulo da mensagem" required>
    </div>
    <div class="mb-3">
        <label for="msg" class="form-label">Mensagem</label>
        <textarea class="form-control" rows="5" name="msg" placeholder="Escreva aqui sua mensagem" required></textarea>
    </div>
<button type="submit" class="btnEnviar">
    Enviar
</button>

</form>
@if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
</div>
</div>
@endsection
