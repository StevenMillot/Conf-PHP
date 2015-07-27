<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::published()->get();
        $comments = Comment::published()->get();
        return view ('blog.index', compact('posts','comments'));
    }

    public function showPost($id)
    {
        $post = Post::find($id);
        $comments = Comment::published($post->id)->get();
        return view ('blog.conference', compact('post', 'comments'));
    }

    public function contact()
    {
        return view ('blog.partials.contact');
    }

    public function about()
    {
        return view ('blog.partials.about');
    }

    public function term()
    {
        return view ('blog.partials.term');
    }

    public function showTag($id)
    {
        $tag = Tag::find($id);
        return view ("tag.single", compact('tag'));
    }

}

