<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request, Topic $topic)
    {

        $request->validate([
            'content' => 'required',
        ]);

        $topic->posts()->create([
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('topics.show', $topic);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('status', 'Post deleted successfully');
    }
}
