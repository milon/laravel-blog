<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user()->loadCount('posts', 'comments');

        return view('admin.profile.index', compact('user'));
    }
}
