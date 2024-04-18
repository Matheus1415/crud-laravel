@extends('master')

@section('content')
    <h1>Minha Lista de user</h1>
    <ul>
        @foreach ($users as $user)
            <li>{{$user->name}}</li>
        @endforeach
    </ul>
@endsection