@extends('layouts.layout')

@section('title', 'Create Comment')

@section('content')
    <h1>Create Comment</h1>
    <form method="POST" action="{{ route('comments.store') }}">
        @csrf
        <div class="form-group">
            <label for="content">Comment Content</label>
            <textarea name="content" id="content" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
