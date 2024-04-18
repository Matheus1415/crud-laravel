@extends('master')

@section('content')

    @if (session()->has('messagem'))
        <p>{{ session()->get('messagem') }}</p>
    @endif

    <h1>Editando Usuário</h1>
    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="nome" id="nome" value="{{ $user->name }}">
        <input type="submit" value="Enviar">
    </form>
@endsection
