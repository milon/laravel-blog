<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\TagResource;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;

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
