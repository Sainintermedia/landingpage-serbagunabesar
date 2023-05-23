<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function blog()
    {
        return view('front.content.blog');
    }
}
