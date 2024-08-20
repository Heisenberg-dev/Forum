@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-5">
    <div class="flex flex-wrap">
        <div class="w-full md:w-3/4 lg:w-9/12">
            <ul class="bg-white rounded-lg shadow-md">
                @foreach($categories as $category)
                    <li class="border-b last:border-none p-4 flex justify-between items-center">
                        <div class="flex items-center">
                            <a href="{{ route('categories.show', $category->id) }}" class="text-lg font-semibold text-blue-500 hover:underline">{{ $category->name }}</a>
                            <span class="ml-2 text-sm text-gray-500">({{ $category->topics_count }} topics)</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-500">
                            <span class="mr-3">{{ $category->views }} views</span>
                            <span class="mr-3">{{ $category->replies }} replies</span>
                            <span>{{ $category->last_activity ? $category->last_activity->diffForHumans() : 'No activity' }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="mt-4">
                {{ $categories->links() }}
            </div>
        </div>

        <div class="w-full md:w-1/4 lg:w-3/12">
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold mb-2">Реклама</h3>
                <p class="text-gray-600">Ваш рекламный блок здесь</p>
            </div>
        </div>
    </div>
</div>
@endsection
