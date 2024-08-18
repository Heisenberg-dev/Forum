@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Forum Categories</h1>

    <ul class="list-group">
        @foreach($categories as $category)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('categories.show', $category->id) }}" class="category-name">{{ $category->name }}</a>
                <div class="d-flex align-items-center">
                    <span class="badge badge-primary badge-pill" id="topicsAmount">{{ $category->topics_count }} topics</span>
                    <span class="ml-3 views">{{ $category->views }} views</span>
                    <span class="ml-3 replies">{{ $category->replies }} replies</span>
                    <span class="ml-3 last-activity">{{ $category->last_activity ? $category->last_activity->diffForHumans() : 'No activity' }}</span>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
