@extends('layouts.app')

@section('content')
    <h1>Topics</h1>
    <a href="{{ route('topics.create') }}">Create New Topic</a>
    <ul>
        @foreach ($topics as $topic)
            <li><a href="{{ route('topics.show', $topic) }}">{{ $topic->title }}</a></li>
        @endforeach
    </ul>
@endsection
