@extends('layouts.adm')

@section('title', 'Home - Adm')

@section('content')

<div class="container mt-5">
    <div class="col fs-3 fw-semibold">
            Lista de Categorias          
        </div>
        <div class="col text-end ">
            <a class="btn btn-success px-3v m-1" role="button" aria-disabled="true" href="{{ url('/admin/categoria/create')}}">
                <i class="fas fa-plus" aria-hidden="true"></i>
            </a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Alterar</th>
                    <th scope="col">Excluir</th>
                </tr>
                <tbody>
                    @foreach($categorias as $c)
                    <tr>
                        <td>{{$c->id}}</td>
                        <td>{{$c->categoria}}</td>
                        <td class="text-center">
                        <a class="dropdown-item" href="{{ url('/admin/categoria/edit/' . $c->id) }}">
                            <i class="fas fa-edit fa-lg text-secondary"></i>
                        </a>

                      </td>
                      <td class="text-center ">
                        <a class="dropdown-item" >
                          <i class="fas fa-trash-alt fa-lg text-danger"></i>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </thead>
        </table>
    </div>
@endsection

