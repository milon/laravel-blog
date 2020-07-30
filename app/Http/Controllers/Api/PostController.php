<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::when($request->title, function ($query) use ($request) {
            return $query->where('title', 'like', "%{$request->title}%");
        })
        ->when($request->search, function ($query) use ($request) {
            return $query->where('title', 'like', "%{$request->search}%")
                         ->orWhere('body', 'like', "%{$request->search}%");
        })
        ->when($request->order, function ($query) use ($request) {
            if ($request->order == 'oldest') {
                return $query->oldest();
            }

            return $query->latest();
        }, function ($query) {
            return $query->latest();
        })
        ->when($request->status, function ($query) use ($request) {
            if ($query->status == 'published') {
                return $query->published();
            }

            return $query->drafted();
        })
        ->paginate($request->get('limit', 10));

        return PostResource::collection($posts);
    }

    public function show(Post $post)
    {
        Cache::put($post->etag, $post->id);

        $post = $post->load(['category', 'comments.user', 'tags', 'user']);

        return new PostResource($post);
    }
}
