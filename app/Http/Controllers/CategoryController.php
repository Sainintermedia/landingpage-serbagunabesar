<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.category.index');
    }

    public function create()
    {
        return view('dashboard.category.create');
    }
}
