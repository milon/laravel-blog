<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($category) {
            $category->posts()->delete();
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
