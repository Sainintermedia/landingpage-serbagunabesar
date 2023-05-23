<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::pluck('name');
        $posts = Post::with(['user', 'cta', 'categories', 'postImage'])->latest()->paginate(10);
        return view('front.index', compact('categories', 'posts'));
    }

    public function blog()
    {
        return view('front.content.blog');
    }
}