<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::count();
        $comments = Comment::count();
        $tags = Tag::count();

        if(auth()->user()->is_admin) {
            $users = User::count();
        }

        return view('home', get_defined_vars());
    }
}
