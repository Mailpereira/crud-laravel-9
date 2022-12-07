@extends('layout.app')
@section('title', 'Novo Comentario')
@section('content')
    <h1>Novo Comentario {{ $user->name }}</h1>
   
    <form action="{{ route('user.comment.store', $user->id) }}" method="post">
        @include('usuarios.comentarios._partials.users-form')
    </form>
@endsection