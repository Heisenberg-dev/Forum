@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-8">
            <h1 class="mb-4">Forum Categories</h1>

            <ul class="list-group">
                @foreach($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <a href="{{ route('categories.show', $category->id) }}" class="category-name">{{ $category->name }}</a>
                            <span class="badge badge-primary badge-pill ml-2">{{ $category->topics_count }} topics</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="views mr-3">{{ $category->views }} views</span>
                            <span class="replies mr-3">{{ $category->replies }} replies</span>
                            <span class="last-activity">{{ $category->last_activity ? $category->last_activity->diffForHumans() : 'No activity' }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>

            <!-- Пагинация -->
            <div class="mt-4">
                {{ $categories->links() }}
            </div>
        </div>

        <!-- Блок для рекламы -->
        <div class="col-md-4">
            <div class="ad-block">
                <h3>Реклама</h3>
                <p>Ваш рекламный блок здесь</p>
            </div>
        </div>
    </div>
</div>
@endsection
