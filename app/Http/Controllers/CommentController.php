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
        $this->middleware('auth', ['only' => 'edit, update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $comments = Comment::all()->sortByDesc('created_at');
        return view('dashboard.comment.index', compact('comments'));
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
        /*$param['status'] = 'unpublish';*/

        $param = $request->all();
        Comment::create($param);

        return back()->with('message', 'Commentaire envoyé, en attente de validation par l\'administrateur');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        /*$comment = Comment::find($id);
        return view ('dashboard.comment.single', compact('comment'));*/
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
        return view ('dashboard.comment.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, CommentRequest $request)
    {
        Comment::find($id)->update($request->all());
        return redirect()->to('comment')->with('message', 'Commentaire modifiée');
    }

    public function changePublish($id)
    {
        $comment = Comment::find($id);

        $comment->status = 'publish';

        $comment->save();

        return redirect()->to('comment')->with('message', 'Status éditer');
    }

    public function changeUnpublish($id)
    {
        $comment = Comment::find($id);

        $comment->status = 'unpublish';

        $comment->save();

        return redirect()->to('comment')->with('message', 'Status éditer');
    }

    public function changeSpam($id)
    {
        $comment = Comment::find($id);

        $comment->status = 'spam';

        $comment->save();

        return redirect()->to('comment')->with('message', 'Status éditer');
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

        return redirect()->to('comment')->with('message', 'Commentaire supprimée');
    }

}
