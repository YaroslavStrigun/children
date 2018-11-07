<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Saying;

class HomeController extends Controller
{
    public function index()
    {
        $sayings = Saying::all();

        $children = Category::where('slug', 'waiting-help')->first()->posts;
        $children_works = Category::where('slug', 'сhild-volunteers')->first()->posts;

        return view('index', compact('sayings', 'children', 'children_works'));
    }

}
