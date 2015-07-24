<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::all()->sortByDesc('date_start')->where('status', 'publish');
        return view ('blog.index', compact('posts'));
    }

    public function showPost($id)
    {
        $post = Post::find($id);
        return view ('blog.conference', compact('post'));
    }

    public function contact()
    {
        return view ('blog.contact');
    }

    public function about()
    {
        return view ('blog.about');
    }

    public function showTag($id)
    {
        $tag = Tag::find($id);
        return view ("tag.single", compact('tag'));
    }

}

