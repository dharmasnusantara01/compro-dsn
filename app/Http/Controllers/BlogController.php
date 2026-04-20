<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::published()->paginate(9);

        return view('pages.blog.index', compact('posts'));
    }

    public function show(string $slug)
    {
        $post = Post::published()->where('slug', $slug)->with('author')->firstOrFail();
        $related = Post::published()->where('id', '!=', $post->id)->limit(3)->get();

        return view('pages.blog.show', compact('post', 'related'));
    }
}
