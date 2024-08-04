@extends('layouts.layout')

@section('title', 'Categories')

@section('content')
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
    <ul>
        @foreach ($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>
@endsection
