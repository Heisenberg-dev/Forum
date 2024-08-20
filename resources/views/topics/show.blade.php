@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>{{ $topic->title }}</h1>
    <p>{{ $topic->description }}</p>

    <h2>Comments</h2>
    <ul class="list-unstyled">
        @foreach ($topic->comments as $comment)
            <li class="media mb-4">
                <img src="{{ $comment->author->avatar }}" class="mr-3 rounded-circle" alt="User Avatar" style="width: 50px; height: 50px;">
                <div class="media-body">
                    <h5 class="mt-0 mb-1">{{ $comment->author->name }} <small class="text-muted">{{ $comment->created_at->format('d M Y') }}</small></h5>
                    {{ $comment->content }}
                    @if(auth()->id() === $comment->user_id)
                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link p-0">Delete</button>
                        </form>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>

    @if(auth()->check())
    <form action="{{ route('topics.comments.store', $topic->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="content">New Comment</label>
            <textarea name="content" id="content" class="form-control" placeholder="New Comment" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Comment</button>
    </form>
    @else
    <p>Please <a href="{{ route('login') }}">log in</a> to add a comment.</p>
    @endif
</div>
@endsection
