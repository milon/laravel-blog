<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(Request $request)
    {
        return Post::when($request->title, function($query) use ($request) {
            return $query->where('title', 'like', "%{$request->title}%");
        })->paginate(10);
    }

    public function show(Post $post)
    {
        $post = $post->load(['category', 'comments.user', 'tags', 'user']);

        return $post;
    }
}
