<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
            'post_id' => 'required',
        ]);

        Comment::create($request->all());

        return back()->with('success', 'Comment created successfully.');
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $comment->update($request->all());

        return back()->with('success', 'Comment updated successfully.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('success', 'Comment deleted successfully.');
    }
}

