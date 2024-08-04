@extends('layouts.layout')

@section('title', 'Edit Post')

@section('content')
    <h1>Edit Post</h1>
    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
        </div>
        <div class="form-group">
            <label for="content">Post Content</label>
            <textarea name="content" id="content" class="form-control" required>{{ $post->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
