<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with('tags', 'category', 'user')
                    ->withCount('comments')
                    ->published()
                    ->simplePaginate(5);

        return view('frontend.index', compact('posts'));
    }

    public function post(Post $post)
    {
        $post = $post->load(['comments.user', 'tags', 'user', 'category']);

        return view('frontend.post', compact('post'));
    }

    public function comment(Request $request, Post $post)
    {
        $this->validate($request, ['body' => 'required']);

        $post->comments()->create([
            'body' => $request->body
        ]);
        flash()->overlay('Comment successfully created');

        return redirect("/posts/{$post->id}");
    }
}
