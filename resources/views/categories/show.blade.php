@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <div class="flex items-center mb-4">
        <h1 class="text-2xl font-bold text-gray-800">{{ $category->name }}</h1>
        <a href="{{ route('topics.create', $category->id) }}" class="inline-block bg-gray-700 text-white px-4 py-2 ml-5 rounded hover:bg-orange-400 focus:outline-none focus:ring-2 focus:ring-blue-500">Create New Topic</a>
    </div>

    <hr class="border-gray-500 mb-6">

    <ul class="bg-white rounded-lg shadow-md">
        @foreach($topics as $topic)
            <li class="border-b last:border-none p-4 flex justify-between items-center">
                <div class="flex items-center">
                    <a href="{{ route('topics.show', $topic->id) }}" class="text-lg font-semibold text-gray-800 hover:underline">{{ $topic->title }}</a>
                    <span class="ml-2 text-sm text-gray-600">({{ $topic->comments_count }} comments)</span>
                </div>
                <div class="flex items-center text-sm text-gray-600">
                    <span class="mr-3">{{ $topic->views }} views</span>
                    <span>{{ $topic->latestActivity ? $topic->latestActivity->created_at->diffForHumans() : 'No activity' }}</span>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
