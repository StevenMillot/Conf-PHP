<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Http\Requests\PostRequest;

use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic;

class PostController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth', ['except' => 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::all()->sortByDesc('created_at');
        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view ('dashboard.post.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PostRequest $request)
    {
        $param = $request->all();
        $param['user_id'] = Auth::user()->id;

        /*$param['status'] = 'publish';*/

        $post = Post::create($param);

        if(array_key_exists( 'tags', $param))
            $post->tags()->attach($param['tags']);

        if ($request->hasFile('thumbnail_link'))
        {
            $file = $request->file('thumbnail_link');
            $ext = $file->getClientOriginalExtension();
            $name = $post->slug . '.' . $ext;
            ImageManagerStatic::make($file)->fit(200,150)->save(public_path() . "/asset/images/confs/" . $name);
            $post->thumbnail_link = $name;
            /*$file->move('asset\images\confs', $name );*/
        }

        $post->save();

        return redirect()->to('post')->with('message', 'Success create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view ('dashboard.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $post = Post::find($id);
        return view ('dashboard.post.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, PostRequest $request)
    {
        $post = Post::find($id);
        $param = $request->all();
        $param['date_start'] = Carbon::parse($param['date_start'])->format('Y-m-d H:i:s');;
        $param['date_end'] = Carbon::parse($param['date_end'])->format('Y-m-d H:i:s');;
        $post->update($param);

        if(array_key_exists( 'tags', $param))
            $post->tags()->sync($param['tags']);

        if ($request->hasFile('thumbnail_link'))
        {
            $file = $request->file('thumbnail_link');
            $ext = $file->getClientOriginalExtension();
            $name = $post->slug . '.' . $ext;
            ImageManagerStatic::make($file)->fit(200,150)->save(public_path() . "/asset/images/confs/" . $name);
            $post->thumbnail_link = $name;
            /*$file->move('asset\images\confs', $name );*/
        }

        $post->save();

        return redirect()->to('post')->with('message', 'Conférence modifiée');
    }

    public function changeStatus($id)
    {
        $post = Post::find($id);

        if($post->status == 'unpublish'){
            $post->status = 'publish';
        }else{
            $post->status = 'unpublish';
        }
        $post->save();

        return redirect()->to('post')->with('message', 'Status éditer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect()->to('post')->with('message', 'Conférence supprimée');
    }
}
