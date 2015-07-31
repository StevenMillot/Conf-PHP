<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;


class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::published()->get();
        return view ('blog.index', compact('posts','comments'));
    }

    public function showPost($id)
    {
        $post = Post::find($id);
        return view ('blog.conference', compact('post'));
    }

    public function contact()
    {
        return view ('blog.partials.contact');
    }

    public function postContact(Requests\ContactFormRequest $request) {
        $email = $request->input('email');
        $content = $request->input('content');
        Mail::send('mail.skeleton', compact('email', 'content'), function ($message) use ($email) {
            $message
                ->from($email)
                ->sender(config('mail.from.address'))
                ->to(config('mail.from.address'))
                ->subject('[ConfPHP] Prise de contact');
        });
        return redirect('contact')->with('message', 'Email envoyé');
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
        $posts = $tag->posts()->published()->get();
        return view ("tag.single", compact('tag', 'posts'));
    }

}

