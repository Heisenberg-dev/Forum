@extends('layouts.app')

@section('content')
    <h1>Create Topic</h1>
    <form action="{{ route('topics.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Title" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" placeholder="Description" required></textarea>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
