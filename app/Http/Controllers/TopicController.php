<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;



class TopicController extends Controller
{
   
    public function index()
    {
        
        $topics = Topic::with('posts', 'author', 'latestactivity' )->get();
        // dd($topics);
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
        'title' => 'required',
        'description' => 'required',
        'category_id' => 'required|exists:categories,id',
        'tags'=> 'nulable|string',
    ]);

    
    $data = $request->only(['title', 'description', 'category_id','tags']);
    $data['user_id'] = auth()->id();

    Topic::create($data);
    return redirect()->route('topics.show')->compact('index');
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
            'tags'=> 'nulable|string',
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
