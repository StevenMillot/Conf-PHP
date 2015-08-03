@extends('dashboard.layouts.admin')

@section('content')
    <h1>Gestion des Commentaires</h1><br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Status</th>
                <th>Date de création</th>
                <th>Conférence</th>
                <th>Email</th>
                <th>Message</th>
                <th>Changer le statut</th>
                <th>Editer</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td><div class="col-lg-12">{{ $comment->status }}</div></td>
                    <td><div class="col-lg-12">{{ $comment->created_at }}</div></td>
                    <td><div class="col-lg-12">{{ $comment->post->title }}</div></td>
                    <td><div class="col-lg-12">{{ $comment->email }}</div></td>
                    <td><div class="col-lg-12">{{ $comment->message }}</div></td>
                    <td>
                        @if($comment->status == 'unpublish')

                            <div class="col-lg-6">
                                {!! Form::open(['id' => $comment->id, 'url' => 'change-status/' . $comment->id . '/publish', 'method' => 'PUT']) !!}
                                <button class="btn btn-success">
                                    Publier
                                </button>
                                {!! Form::close() !!}
                            </div>
                            <div class="col-lg-6">
                                {!! Form::open(['id' => $comment->id, 'url' => 'change-status/' . $comment->id . '/spam', 'method' => 'PUT']) !!}
                                <button class="btn btn-warning">
                                    Spam
                                </button>
                                {!! Form::close() !!}
                            </div>
                        @else
                            <div class="col-lg-12">
                                {!! Form::open(['id' => $comment->id, 'url' => 'change-status/' . $comment->id . '/unpublish', 'method' => 'PUT']) !!}
                                <button class="btn btn-default">
                                    Dé-publier
                                </button>
                                {!! Form::close() !!}
                            </div>
                        @endif
                    </td>
                    <td>
                        <div class="col-lg-6">
                            <button class="btn btn-default">
                                <a href="{{url('comment/' . $comment->id . '/edit')}}">Editer</a>
                            </button>
                        </div>
                    </td>
                    <td>
                        <div class="col-lg-12">
                            {!! Form::open(['class' => 'delete', 'url' => 'comment/' . $comment->id, 'method' => 'DELETE']) !!}
                            <button class="btn btn-danger">
                                Supprimer
                            </button>
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if(count($comments)<=0)
        <p>Désolé pas de commentaire</p>
    @endif

@endsection
