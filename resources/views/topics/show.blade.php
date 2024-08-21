@extends('layouts.app')

@section('content')
<div class="flex items-center mb-6">
    @if($topic->author)
        <img src="{{ $topic->author->avatar }}" class="w-12 h-12 rounded-full mr-4" alt="User Avatar">
        <div>
            <strong class="text-lg">{{ $topic->author->name }}</strong>
            <small class="text-gray-600">• {{ $topic->created_at->format('d M Y') }}</small>
        </div>
    @else
        <div>
            <strong class="text-lg">Unknown Author</strong>
            <small class="text-gray-600">• {{ $topic->created_at->format('d M Y') }}</small>
        </div>
    @endif
</div>

<div class="container mx-auto mt-8">
    <div class="bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4">{{ $topic->title }}</h1>
        <p class="text-gray-700">{{ $topic->description }}</p>
    </div>
    <hr class="my-6 border-gray-300">

    <ul class="space-y-6">
        @foreach ($topic->comments as $comment)
            <li class="flex items-start">
                @if($comment->author)
                    <img src="{{ $comment->author->avatar }}" class="w-12 h-12 rounded-full mr-4" alt="User Avatar">
                    <div class="flex-1">
                        <h5 class="text-lg font-semibold">{{ $comment->author->name }} 
                            <small class="text-gray-600">• {{ $comment->created_at->format('d M Y') }}</small>
                        </h5>
                        <p class="text-gray-700">{{ $comment->content }}</p>
                        @if(auth()->id() === $comment->user_id)
                            <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="inline-block mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        @endif
                    </div>
                @else
                    <div class="flex-1">
                        <h5 class="text-lg font-semibold">Unknown User 
                            <small class="text-gray-600">• {{ $comment->created_at->format('d M Y') }}</small>
                        </h5>
                        <p class="text-gray-700">{{ $comment->content }}</p>
                        @if(auth()->id() === $comment->user_id)
                            <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="inline-block mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        @endif
                    </div>
                @endif
            </li>
            <hr class="border-gray-200">
            
        @endforeach
    </ul>

    @if(auth()->check())
        <form action="{{ route('topics.comments.store', $topic->id) }}" method="POST" class="mt-6">
            @csrf
            <div class="mb-4">
                <textarea name="content" id="content" class="w-full p-4 border rounded-lg" placeholder="New Comment" required></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Add Comment</button>
        </form>
    @else
        <p class="mt-4 text-gray-600">Please <a href="{{ route('login') }}" class="text-blue-500 hover:underline">log in</a> to add a comment.</p>
    @endif
    
    <div class="mt-10">
        <div class="bg-gray-100 p-6 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-4">Реклама</h3>
            <p class="text-gray-700">Ваш рекламный блок здесь</p>
        </div>
    </div>
</div>
@endsection
