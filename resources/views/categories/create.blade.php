@extends('layouts.layout')

@section('title', 'Create Category')

@section('content')
    <h1>Create Category</h1>
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
