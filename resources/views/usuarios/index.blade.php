@extends('layout.app')
@section('title', 'Listagem dos usuarios')
@section('content')
    <h1>Listagem de Usuarios</h1>
    <form action="{{ route('users.index') }}" method="get">
        <input type="search" name="search" placeholder="pesquisar">
        <button type="submit">pesquisar</button>
    </form>
    <h2>Criar novo <a href="{{ route('users.create') }}">Usuario</a></h2>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name}} - {{ $user->email}} ## <a href="{{ route('users.show', $user->id) }}">Detalhes</a> ## <a href="{{ route('users.edit', $user->id) }}">Editar</a></li>        
        @endforeach
    </ul>
@endsection