@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-5">
    <h1 class="text-2xl font-bold mb-4">Профиль</h1>
    <div class="mb-4">
        <strong>Имя:</strong> {{ $user->name }}
    </div>
    <div class="mb-4">
        <strong>Логин:</strong> {{ $user->username }}
    </div>
    <div class="mb-4">
        <strong>Email:</strong> {{ $user->email }}
    </div>
    <div class="mb-4">
        <strong>Телефон:</strong> {{ $user->phone }}
    </div>
    <div class="mb-4">
        <strong>Страна:</strong> {{ $user->country }}
    </div>
    <div class="mb-4">
        <img src="{{ $user->avatar }}" alt="Avatar" class="w-24 h-24 rounded-full">
    </div>
    <a href="{{ route('profile.edit') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Редактировать профиль
    </a>
</div>
@endsection
