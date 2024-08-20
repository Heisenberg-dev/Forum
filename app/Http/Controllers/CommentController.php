<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Topic;
use Illuminate\Http\Request;

class CommentController extends Controller
{
   
    public function store(Request $request, Topic $topic)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = auth()->id();  // ID текущего пользователя
        $comment->topic_id = $topic->id;   // ID текущей темы

        $comment->save();

        // Перенаправление обратно к теме
        return redirect()->route('topics.show', $topic->id)->with('success', 'Comment added successfully!');
    }

    // Метод для удаления комментария
    public function destroy(Comment $comment)
    {
        // Проверка, что пользователь - автор комментария или администратор
        if (auth()->id() !== $comment->user_id && !auth()->user()->isAdmin()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
