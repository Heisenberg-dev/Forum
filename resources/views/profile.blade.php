@extends('layouts.app')

@section('content')
    <h1>Профиль</h1>
    <p>Добро пожаловать, {{ Auth::user()->name }}!</p>
@endsection
