<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status','published')->latest('published_at')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('status','published')->firstOrFail();
        $more = Post::where('category_id', $post->category_id)->where('id','!=',$post->id)->latest('published_at')->take(5)->get();
        return view('posts.show', compact('post','more'));
    }

    public function category($slug)
    {
        $category = Category::where('slug',$slug)->firstOrFail();
        $posts = $category->posts()->where('status','published')->latest('published_at')->paginate(10);
        return view('categories.index', compact('category','posts'));
    }
}
