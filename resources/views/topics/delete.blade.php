@extends('layouts.app')

@section('content')
    <h1>Create Topic</h1>
    <form action="{{ route('topics.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Title">
        <textarea name="description" placeholder="Description"></textarea>
        <button type="submit">Create</button>
    </form>
@endsection
