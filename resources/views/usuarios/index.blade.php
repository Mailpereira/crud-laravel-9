@extends('layout.app')
@section('title', 'Listagem dos usuarios')
@section('content')
    <h1>Listagem de Usuarios</h1>
    <h2>Criar novo <a href="{{ route('users.create') }}">Usuario</a></h2>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name}} - {{ $user->email}} ## <a href="{{ route('users.show', $user->id) }}">Detalhes</a> ## <a href="{{ route('users.edit', $user->id) }}">Editar</a></li>        
        @endforeach
    </ul>
@endsection