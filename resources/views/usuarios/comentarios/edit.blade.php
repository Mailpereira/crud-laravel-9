@extends('layout.app')
@section('title', "Editando Comentario do {{$user->name}}")
@section('content')
    <form action="{{ route('user.comment.update', $comment->id) }}" method="post">
        @method('put')
        @csrf        
            <textarea name="body" cols="30" rows="10" placeholder="Comentario">{{ $comment->body }}</textarea>
            <input type="checkbox" name="visible"
                @if (isset($comment) && $comment->visible) 
                    checked = "checked"
                @endif
            >
            <label for="visible">Visivel ?</label>
            <button type="submit">Enviar</button>
    </form>
@endsection