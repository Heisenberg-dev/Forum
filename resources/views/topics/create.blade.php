@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Create New Topic</h1>

    <form action="{{ route('topics.store', '[category] => $category->id') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Topic Title" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" placeholder="Topic Description" required></textarea>
        </div>

        <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" name="tags" id="tags" class="form-control" placeholder="Tags (comma separated)">
        </div>

        <button type="submit" class="btn btn-primary">Create Topic</button>
    </form>
</div>
@endsection
