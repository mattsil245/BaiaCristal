@extends('layouts.app')

@section('title', 'Home')

@section('content')
@if(session('sucesso'))
    <div class="alert alert-success">
        {{ session('sucesso') }}
    </div>
@endif
@endsection