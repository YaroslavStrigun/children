<?php

namespace App\Http\Controllers;


use App\Models\Saying;

class HomeController extends Controller
{
    public function index()
    {
        $sayings = Saying::all();

        return view('index', compact('sayings'));
    }

}
