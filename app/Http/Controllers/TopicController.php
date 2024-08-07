<?php
namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
   
    public function index()
    {
        
        $topics = Topic::all();
        // dd($topics);
        return view('topics.index', compact('topics')); 
    }

    public function create()
    {
        return view('topics.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

    // Используем только поля title и description для создания новой записи
    $data = $request->only(['title', 'description']);

    Topic::create($data);
    return redirect()->route('topics.index');
}

    public function show(Topic $topic)
    {
        return view('topics.show', compact('topic'));
    }

    public function edit(Topic $topic)
    {
        return view('topics.edit', compact('topic'));
    }

    public function update(Request $request, Topic $topic)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
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
