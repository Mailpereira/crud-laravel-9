@extends('layout.app')
@section('title', 'Listagem do usuario')
@section('content')
    <h1>Listagem de Usuarios {{$user->name}}</h1>

    <ul>
        <li>{{$user->name}}</li>
        <li>{{$user->email}}</li>
    </ul>

    <a href="{{ route('users.index') }}">Voltar</a>
    
    <form action="{{ route('users.delete', $user->id) }}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit">Deletar</button>
    </form>

@endsection