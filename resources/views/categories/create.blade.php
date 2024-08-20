@extends('layouts.layout')

@section('title', 'Create Category')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Create Category</h1>
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Save</button>
    </form>
@endsection
