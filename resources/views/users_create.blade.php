@extends('master')

@section('content')

    @if (session()->has('message'))
        <p>{{ session()->get('message') }}</p>
    @endif

    <h1>Criando Usuário</h1>
    <form action="{{ route('users.store')}}" method="post">
        @csrf
        <input type="text" name="name" id="name" value="">
        <input type="submit" value="Criar user">
    </form>
@endsection
