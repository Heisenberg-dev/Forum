@extends('layouts.app')

@section('content')

    <h1>{{ $topic->title }}</h1>
    <p>{{ $topic->description }}</p>

    <h2>Comments</h2>
    <ul>
        @foreach ($topic->comments as $comment)
            <li>
                {{ $comment->content }}
                <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    @if(auth()->check())
    <form action="{{ route('topics.comments.store', $topic->id) }}" method="POST">
        @csrf
        <div>
            <label for="content">New Comment</label>
            <textarea name="content" id="content" placeholder="New Comment" required></textarea>
        </div>
        <button type="submit">Add Comment</button>
    </form>
    @else
    <p>Please <a href="{{ route('login') }}">log in</a> to add a comment.</p>
@endif
@endsection
