<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\TagResource;
use App\Http\Resources\UserResource;
use App\Models\Category;
use App\Models\Tag;
use App\User;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function tags()
    {
        $tags = Tag::paginate(10);

        return TagResource::collection($tags);
    }

    public function categories()
    {
        $categories = Category::paginate(10);

        return CategoryResource::collection($categories);
    }

    public function users()
    {
        $users = User::paginate(10);

        return UserResource::collection($users);
    }
}
