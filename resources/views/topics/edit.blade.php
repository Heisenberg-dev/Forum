@extends('layouts.app')

@section('content')
<h1>Edit Topic</h1>
<form action="{{ route('topics.update', $topic) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $topic->title }}" required>
    </div>

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
        <label for="description">Description</label>
        <textarea name="description" id="description" required>{{ $topic->description }}</textarea>
    </div>
    <button type="submit">Update</button>
</form>
@endsection