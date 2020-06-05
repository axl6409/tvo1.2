<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function byCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = Category::find($category->id)->posts;
        return view('frontend.pages.guides.byCategory', compact('posts', 'category'));
    }

    public function showPost($category, $slug)
    {
        $catId = Category::where('slug', $category)->first();
        $category = Category::findOrFail($catId)->first();
        $postId = Post::where('slug', $slug)->first();
        $post = Post::findOrFail($postId)->first();
        return view('frontend.pages.guides.show', compact('post', 'category'));
    }
}
