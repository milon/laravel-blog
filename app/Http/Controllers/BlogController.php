<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with('tags', 'category')
                    ->withCount('comments')
                    ->simplePaginate(5);

        return view('frontend.index', compact('posts'));
    }
}
