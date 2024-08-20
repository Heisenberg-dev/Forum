@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">{{ $category->name }}</h1>

<p class="mb-6">{{ $category->description }}</p>

<a href="{{ route('topics.create', $category->id) }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Create New Topic</a>

<ul class="mt-6 space-y-4">
    @foreach($topics as $topic)
        <li>
            <a href="{{ route('topics.show', $topic->id) }}" class="text-lg text-blue-500 hover:underline">
                {{ $topic->title }} <span class="text-gray-600">({{ $topic->comments_count }} comments)</span>
            </a>
        </li>
    @endforeach
</ul>
@endsection
