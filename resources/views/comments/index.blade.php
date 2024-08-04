@extends('layouts.layout')

@section('title', 'Comments')

@section('content')
    <h1>Comments</h1>
    <a href="{{ route('comments.create') }}" class="btn btn-primary">Add Comment</a>
    <ul>
        @foreach ($comments as $comment)
            <li>{{ $comment->content }}</li>
        @endforeach
    </ul>
@endsection
