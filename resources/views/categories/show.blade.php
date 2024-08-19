@extends('layouts.app')

@section('content')
<h1>{{ $category->name }}</h1>

<p>{{ $category->description }}</p>

<a href="{{ route('topics.create', $category->id) }}" class="btn btn-primary">Create New Topic</a>

<h2>Topics</h2>

<ul>
    @foreach($topics as $topic)
        <li>
            <a href="{{ route('topics.show', $topic->id) }}">
                {{ $topic->title }} ({{ $topic->comments_count }} comments)
            </a>
        </li>
    @endforeach
</ul>
@endsection
