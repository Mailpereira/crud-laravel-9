@extends('layout.app')
@section('title', 'Cadastro de usuario')
@section('content')
    <h1>Novo Usuário</h1>
    @include('components.component-error')
    <form action="{{ route('users.store') }}" method="post">
        @include('usuarios._partials.users-form')
    </form>
@endsection