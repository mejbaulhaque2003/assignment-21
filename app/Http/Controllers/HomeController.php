<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $recentPosts = Post::where('status','published')->latest('published_at')->take(8)->get();
        return view('home', compact('categories','recentPosts'));
    }
}
