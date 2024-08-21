@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6 flex items-center">
<h1 class="text-2xl font-bold text-gray-800 ">{{ $category->name }}</h1>


<p class="mb-6">{{ $category->description }}</p>

<a href="{{ route('topics.create', $category->id) }}" class="inline-block bg-gray-700 text-white px-4 py-2 ml-10 rounded hover:bg-orange-400 focus:outline-none focus:ring-2 focus:ring-blue-500">Create New Topic</a>
</div>
<hr class="border-gray-500 mt-5">
<ul class="mt-6 space-y-4">
    @foreach($topics as $topic)
        <li>
            <a href="{{ route('topics.show', $topic->id) }}" class="text-lg text-gray-800 hover:underline">
                {{ $topic->title }} <span class="text-gray-600">({{ $topic->comments_count }} comments)</span>
            </a>
        </li>
    @endforeach
</ul>
@endsection
