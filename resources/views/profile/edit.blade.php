@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-5">
    <h1 class="text-2xl font-bold mb-4">Редактировать профиль</h1>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Имя</label>
            <input type="text" name="name" id="name" class="w-full p-2 border rounded" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-4">
            <label for="username" class="block text-gray-700">Логин</label>
            <input type="text" name="username" id="username" class="w-full p-2 border rounded" value="{{ old('username', $user->username) }}" required>
            @error('username')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-gray-700">Телефон</label>
            <input type="text" name="phone" id="phone" class="w-full p-2 border rounded" value="{{ old('phone', $user->phone) }}">
        </div>

        <div class="mb-4">
            <label for="country" class="block text-gray-700">Страна</label>
            <input type="text" name="country" id="country" class="w-full p-2 border rounded" value="{{ old('country', $user->country) }}">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700">Пароль</label>
            <input type="password" name="password" id="password" class="w-full p-2 border rounded">
            <small class="text-gray-500">Оставьте поле пустым, если не хотите изменять пароль</small>
        </div>

        <div class="mb-4">
    <label for="avatar" class="block text-gray-700">Avatar</label>
    <input type="file" name="avatar" id="avatar" class="w-full p-2 border rounded">
    @if ($user->avatar)
        <div class="mt-2">
            <img src="{{ $user->avatar }}" alt="Current Avatar" class="h-16 w-16 rounded-full">
            <label>
                <input type="checkbox" name="remove_avatar"> Remove Avatar
            </label>
        </div>
    @endif
</div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Сохранить изменения</button>
    </form>
</div>
@endsection
