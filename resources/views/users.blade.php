@extends('master')

@section('content')
<a href="{{route('users.create')}}">Criar usúario</a>
<hr>
    <h1>Minha Lista de user</h1>
    <ul>
        @foreach ($users as $user)
            <li>{{$user->name}} | <a href="{{route('users.edit', $user)}}" id="edit">Edit</a> | <a href="{{route('users.destroy', $user->id)}}" id="x">X</a></li>
        @endforeach
    </ul>
@endsection