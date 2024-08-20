@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6">Edit Topic</h1>

    <form action="{{ route('topics.update', $topic) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
            <input type="text" name="title" id="title" value="{{ $topic->title }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
        </div>

        <div>
            <label for="category_id" class="block text-gray-700 font-medium mb-2">Category</label>
            <select name="category_id" id="category_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $topic->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea name="description" id="description" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ $topic->description }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">Update</button>
    </form>
</div>
@endsection
