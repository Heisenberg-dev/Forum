@extends('layouts.layout')

@section('title', 'Create Post')

@section('content')
    <h1>Create Post</h1>
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Post Content</label>
            <textarea name="content" id="content" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
