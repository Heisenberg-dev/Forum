@extends('layouts.layout')

@section('title', 'Posts')

@section('content')
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Add Post</a>
    <ul>
        @foreach ($posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>
@endsection
