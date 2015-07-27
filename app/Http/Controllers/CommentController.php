<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $comments = Comment::published()->get();
        return view('comment.index', compact('comments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CommentRequest $request)
    {
        /*
        $comment = new Comment();
        $comment->email = $request['email'];
        $comment->message = $request['message'];
        $comment->status = 'unpublish';
        $comment->save();
        */

        $request = $request->all();
        $request['status'] = 'unpublish';
        Comment::create($request);
        return back()->with('message', 'Commentaire en cours de validation par l\'administrateur');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view ('comment.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view ('comment.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, CommentRequest $request)
    {
        $comment = Comment::find($id)->update($request->all());
        return redirect()->to('comment')->with('message', 'success update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Comment::destroy($id);

        return redirect()->to('comment')->with('message', 'success create');
    }

}
