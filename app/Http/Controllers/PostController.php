<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request, Topic $topic)
    {
        \Log::info('Store method called');
        \Log::info('Request data: ', $request->all());
        \Log::info('Topic ID: ', [$topic->id]);


        $request->validate([
            'content' => 'required',
        ]);

        $topic->posts()->create([
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        \Log::info('Post created successfully');
        
        return redirect()->route('topics.show', $topic);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }
}
