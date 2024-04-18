@extends('master')

@section('content')
<a href="{{ route('users.create') }}">Criar usuário</a>
<hr>
<h1>Minha Lista de Usuários</h1>
<ul>
    @foreach ($users as $user)
    <li>
        {{ $user->name }} | 
        <a href="{{ route('users.edit', $user->id) }}" id="edit">Editar</a> | 
        <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" id="x">Excluir</button>
        </form>
    </li>
    @endforeach
</ul>
@endsection
