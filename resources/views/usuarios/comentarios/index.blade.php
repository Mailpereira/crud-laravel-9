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
        @foreach ($comments as $comment)
            <li>{{$comment->body}} - {{$comment->visible ? 'SIM' : 'NÃO'}} ## <a href="{{ route('user.comment.edit', ['user_id' => $user->id, 'comment_id' => $comment->id]) }}">Editar</a> ##
                <form action="{{route('user.comment.delete', ['user_id' => $user->id, 'id' => $comment->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">Deletar</button>
                </form>
            </li>        
        @endforeach
    </ul>    
@endsection