<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    @vite(['resources/css/app.css']) <!-- Не забудьте заменить home.css на app.css, если вы используете Vite с Tailwind -->
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="header flex justify-between items-center p-4 bg-gray-800 text-white">
        <div class="space-x-4">
            <a href="{{ url('/categories') }}" class="hover:text-gray-300">Разделы</a>
            <a href="{{ url('/rules') }}" class="hover:text-gray-300">Правила</a>
            <a href="{{ url('/profile') }}" class="hover:text-gray-300">Профиль</a>
            <a href="{{ url('/clubs') }}" class="hover:text-gray-300">Клуб интересов</a>
            <a href="{{ url('/hot') }}" class="hover:text-gray-300">Горячее</a>
        </div>
        <div class="username space-x-4">
            @auth
                <span>{{ Auth::user()->name }}</span>
                <a href="{{ route('logout') }}" 
                   class="hover:text-gray-300" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-gray-300">Войти</a>
                <a href="{{ route('register') }}" class="hover:text-gray-300">Регистрация</a>
            @endauth
        </div>
    </div>
    <div class="container mx-auto mt-6">
        @yield('content')
    </div>
</body>
</html>
