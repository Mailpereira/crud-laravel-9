@extends('layout.app')
@section('title', 'Editando Usuário')
@section('content')
    <h1>Editando o Usuario {{ $user->name }}</h1>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <ul>
                <li>{{ $error }}</li>
            </ul>
        @endforeach
    @endif
    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('put')
        <input type="text" name="name" value="{{ $user->name }}" placeholder="Digite o seu Nome: ">
        <input type="email" name="email" value="{{ $user->email }}" placeholder="Digite seu email: ">
        <input type="password" name="password" placeholder="Digite sua senha: ">
        <button type="submit">Enviar</button>
    </form>
@endsection