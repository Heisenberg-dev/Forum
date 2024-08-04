<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
public function store(Request $request)
{
$request->validate([
'body' => 'required',
'thread_id' => 'required',
]);

Post::create($request->all());

return back()->with('success', 'Post created successfully.');
}

public function edit(Post $post)
{
return view('posts.edit', compact('post'));
}

public function update(Request $request, Post $post)
{
$request->validate([
'body' => 'required',
]);

$post->update($request->all());

return back()->with('success', 'Post updated successfully.');
}

public function destroy(Post $post)
{
$post->delete();

return back()->with('success', 'Post deleted successfully.');
}
}
