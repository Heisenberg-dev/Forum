@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6">Create New Topic</h1>

    <form action="{{ route('topics.store', $category->id) }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="category_id" class="block text-gray-700 font-medium mb-2">Category</label>
            <select name="category_id" id="category_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $cat->id == $category->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
            <input type="text" name="title" id="title" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Topic Title" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea name="description" id="description" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Topic Description" required></textarea>
        </div>

        <div class="mb-4">
            <label for="tags" class="block text-gray-700 font-medium mb-2">Tags</label>
            <input type="text" name="tags" id="tags" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Tags (comma separated)">
        </div>

        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">Create Topic</button>
    </form>
</div>
@endsection
