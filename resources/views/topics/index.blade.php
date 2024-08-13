@extends('layouts.app')

@section('content')
<h1>Topics</h1>
   <div class="create"> 
    <a href="{{ route('topics.create') }}">Create New Topic</a>

    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Topic</th>
                    <th>Replies</th>
                    <th>Views</th>
                    <th>Activity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($topics as $topic)
                    <tr>
                        <td>
                            <a href="{{ route('topics.show', $topic->id) }}">{{ $topic->title }}</a>
                        </td>
                        <td>{{ $topic->posts->count() }}</td>
                        <td>{{ $topic->views }}</td>
                        <td>{{ $topic->latestActivity ? $topic->latestActivity->created_at->diffForHumans() : '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

