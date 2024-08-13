@extends('layouts.app')

@section('content')
    <h1>{{ $topic->title }}</h1>
    <p>{{ $topic->description }}</p>

    <h2>Posts</h2>
    <ul>
        @foreach ($topic->posts as $post)
            <li>
                {{ $post->content }}
                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    @if(auth()->check())
    <form action="{{ route('topics.posts.store', $topic->id) }}" method="POST">
        @csrf
        <div>
            <label for="content">New Post</label>
            <textarea name="content" id="content" placeholder="New Post" required></textarea>
        </div>
        <button type="submit">Add Post</button>
    </form>
    @else
    <p>Please <a href="{{ route('login') }}">log in</a> to add a post.</p>
@endif
