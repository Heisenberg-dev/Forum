@extends('layouts.app')

@section('content')
<h1>Create New Topic</h1>

<form action="{{ route('topics.store') }}" method="POST">
    @csrf

    <div>
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ isset($topic) && $topic->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" placeholder="Topic Title" required>
    </div>

    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" placeholder="Topic Description" required></textarea>
    </div>

    <div>
        <label for="tags">Tags</label>
        <input type="text" name="tags" id="tags" placeholder="Tags (comma separated)">
    </div>

    <button type="submit">Create Topic</button>
</form>
@endsection
