@extends('layouts.layout')

@section('title', 'Edit Comment')

@section('content')
    <h1>Edit Comment</h1>
    <form method="POST" action="{{ route('comments.update', $comment->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="content">Comment Content</label>
            <textarea name="content" id="content" class="form-control" required>{{ $comment->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
