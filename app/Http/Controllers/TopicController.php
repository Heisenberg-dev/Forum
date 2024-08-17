<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index(Category $category)
    {
        $topics = $category->topics()->with('posts', 'author', 'latestActivity')->get();
        return view('topics.index', compact('topics'));
    }

    public function create()
    {   
        $categories = Category::all();
        return view('topics.create', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required',
        'category_id' => 'required|exists:categories,id',
        'tags' => 'nullable|string',
    ]);

    $data = $request->only(['title', 'description', 'category_id', 'tags']);
    $data['user_id'] = auth()->id();

    $topic = Topic::create($data); // Создаем топик

    // Перенаправляем на страницу отображения созданного топика
    return redirect()->route('categories.show', ['category' => $topic->id]);
}


    public function show(Topic $topic)
    {
        return view('topics.show', compact('topic'));
    }

    public function edit(Topic $topic)
    {
        $categories = Category::all();
        return view('topics.edit', compact('topic', 'categories'));
    }

    public function update(Request $request, Topic $topic)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|string',
        ]);

        $topic->update($request->all());
        return redirect()->route('topics.index');
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();
        return redirect()->route('topics.index');
    }
}
