<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') - Forum</title>
    @vite(['resources/css/home.css'])
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Forum</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="/categories">Categories</a></li>
            <li class="nav-item"><a class="nav-link" href="/threads">Threads</a></li>
            <li class="nav-item"><a class="nav-link" href="/posts">Posts</a></li>
            <li class="nav-item"><a class="nav-link" href="/comments">Comments</a></li>
        </ul>
    </div>
</nav>
<div class="container mt-4">
    @yield('content')
</div>
</body>
</html>
