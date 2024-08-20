<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TopicController extends Controller
{
    public function index(Category $category)
    {
        $topics = $category->topics()->with('comments', 'author', 'latestActivity')->get();
        return view('topics.index', compact('topics'));
    }

    public function store(Request $request, Category $category)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to create a topic.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|string',
        ]);

        $data = $request->only(['title', 'description', 'category_id', 'tags']);
        $data['user_id'] = auth()->id(); // Здесь добавляется ID пользователя

        $topic = Topic::create($data);

        return redirect()->route('categories.show', ['category' => $category->id])
            ->with('success', 'Topic created successfully.');
    }

    public function show(Topic $topic)
    {
        return view('topics.show', compact('topic'));
    }

    public function create(Category $category)
    {
        $categories = Category::all();
        return view('topics.create', compact('categories', 'category'));
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
