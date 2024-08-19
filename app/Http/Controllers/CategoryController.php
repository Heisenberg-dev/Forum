<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('topics')->paginate(10);

        foreach ($categories as $category) {
            $category->views = $category->topics()->sum('views');
            $category->replies = $category->commentsCount();
            $category->last_activity = $category->latestActivity();
        }

        return view('categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $topics = $category->topics()->withCount('comments')->orderBy('comments_count', 'desc')->get();
        return view('categories.show', compact('category', 'topics'));
    }


    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
