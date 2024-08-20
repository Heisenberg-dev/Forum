<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Forum</title>
    @vite(['resources/css/app.css', 'resources/css/category.css']) 
</head>
<body class="bg-gray-100 text-gray-900">
<nav class="bg-white shadow p-4">
    <div class="container mx-auto flex items-center justify-between">
        <a class="text-xl font-bold text-gray-800" href="/">Forum</a>
        <div class="hidden md:flex space-x-4">
            <a href="/categories" class="text-gray-700 hover:text-gray-900">Categories</a>
            <a href="/threads" class="text-gray-700 hover:text-gray-900">Threads</a>
            <a href="/posts" class="text-gray-700 hover:text-gray-900">Posts</a>
            <a href="/comments" class="text-gray-700 hover:text-gray-900">Comments</a>
        </div>
    </div>
</nav>
<div class="container mx-auto mt-4">
    @yield('content')
</div>
</body>
</html>
