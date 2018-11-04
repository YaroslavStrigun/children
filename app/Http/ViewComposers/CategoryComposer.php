<?php

namespace App\Http\ViewComposers;


use App\Models\Category;
use App\Models\Page;
use Illuminate\View\View;

class CategoryComposer
{
    public function compose(View $view)
    {
        $view->with(['categories' =>  Category::all(), 'pages' => Page::all()]);
    }

}
