@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-6">Topics in {{ $category->name }}</h1>
    
    <div class="mb-6">
        <a href="{{ route('topics.create', ['category' => $category->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create New Topic</a>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-3 px-4 bg-gray-200 font-semibold text-sm text-left">Topic</th>
                    <th class="py-3 px-4 bg-gray-200 font-semibold text-sm text-left">Replies</th>
                    <th class="py-3 px-4 bg-gray-200 font-semibold text-sm text-left">Views</th>
                    <th class="py-3 px-4 bg-gray-200 font-semibold text-sm text-left">Activity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($topics as $topic)
                    <tr class="border-b">
                        <td class="py-3 px-4">
                            <a href="{{ route('topics.show', $topic->id) }}" class="text-blue-500 hover:underline">{{ $topic->title }}</a>
                        </td>
                        <td class="py-3 px-4">{{ $topic->posts->count() }}</td>
                        <td class="py-3 px-4">{{ $topic->views }}</td>
                        <td class="py-3 px-4">{{ $topic->latestActivity ? $topic->latestActivity->created_at->diffForHumans() : '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
