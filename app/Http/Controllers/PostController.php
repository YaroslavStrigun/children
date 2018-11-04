<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Page;
use App\Models\Post;

class PostController
{
    public function postsByCategory($slug)
    {
        $category = Category::where('slug', $slug)->with('posts.attachments')->first();
        $posts = $category->posts()->paginate(1);

        if (is_null($category))
            return back();
        else
            return view('posts', compact('category', 'posts'));
    }

    public function getPost($slug, $id)
    {
        $post = Post::with(['attachments', 'videos'])->find($id);

        return view('post', compact('post'));
    }

    public function pageBySlug($slug)
    {
        $page = Page::where('slug', $slug)->first();

        return view('page', compact($page));
    }
}
