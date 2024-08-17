@extends('layouts.app')

@section('content')
<h1>Forum Categories</h1>

<ul>
    @foreach($categories as $category)
        <li>
            <a href="{{ route('categories.show', $category->id) }}">
                {{ $category->name }} ({{ $category->topics_count }} topics)
            </a>
        </li>
    @endforeach
</ul>
@endsection
