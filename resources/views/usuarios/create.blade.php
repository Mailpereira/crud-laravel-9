@extends('layout.app')
@section('title', 'Cadastro de usuario')
@section('content')
    <h1>Novo Usuário</h1>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <ul>
                <li>{{ $error }}</li>
            </ul>
        @endforeach
    @endif
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <input type="text" name="name" value="{{ old("name") }}" placeholder="Digite o seu Nome: ">
        <input type="email" name="email" value="{{ old("email") }}" placeholder="Digite seu email: ">
        <input type="password" name="password" placeholder="Digite sua senha: ">
        <button type="submit">Enviar</button>
    </form>
@endsection