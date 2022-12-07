@extends('layout.app')
@section('title', "Comentarios do {{ $user->name }}")
@section('content')
    <h1>Listagem de Comentarios do {{ $user->name }}</h1>
    <form action="{{ route('users.index') }}" method="get">
        <input type="search" name="search" placeholder="pesquisar">
        <button type="submit">pesquisar</button>
    </form>
    <h1>Comentarios do {{ $user->name }}</h1>
    <a href="{{ route('user.comment.create', $user->id) }}">Novo Comentario</a>
    <ul>
        @foreach ($comentarios as $comentar)
            <li>{{$comentar->body}} - {{$comentar->visible ? 'SIM' : 'NÃO'}}</li>        
        @endforeach
    </ul>    
@endsection