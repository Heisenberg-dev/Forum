<!DOCTYPE html>
<html>
<head>
    <title>Forum</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    <div class="header">
        <div>
            <a href="{{ url('/topics') }}">Разделы</a>
            <a href="{{ url('/rules') }}">Правила</a>
            <a href="{{ url('/profile') }}">Профиль</a>
            <a href="{{ url('/clubs') }}">Клуб интересов</a>
            <a href="{{ url('/hot') }}">Горячее</a>
        </div>
        <div class="username">
            @auth
                <span>{{ Auth::user()->name }}</span>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}">Войти</a>
                <a href="{{ route('register') }}">Регистрация</a>
            @endauth
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>



