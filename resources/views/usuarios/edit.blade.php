@extends('layout.app')
@section('title', 'Editando Usuário')
@section('content')
    <h1>Editando o Usuario {{ $user->name }}</h1>
    @include('components.component-error')
    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('usuarios._partials.users-form')
    </form>
@endsection