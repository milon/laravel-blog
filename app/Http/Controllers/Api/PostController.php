<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->get('limit', 10);

        $post = Post::when($request->title, function($query) use ($request) {
            return $query->where('title', 'like', "%{$request->title}%");
        })
        ->when($request->search, function($query) use ($request) {
            return $query->where('title', 'like', "%{$request->search}%")
                         ->orWhere('body', 'like', "%{$request->search}%");
        })->paginate($limit);
    }

    public function show(Post $post)
    {
        $post = $post->load(['category', 'comments.user', 'tags', 'user']);

        return $post;
    }
}
