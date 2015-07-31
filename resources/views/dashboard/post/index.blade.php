@extends('dashboard.layouts.admin')

@section('title')
    {{$title or "Admin Post"}}
@endsection

@section('content')
    <article class="dashboard">
        <h1>Gestion des Conférences</h1>
        <button class="btn btn-success">
            <a href="{{url('post/create/')}}">
                Publier
            </a>
        </button>
        <div class="container-fluid">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Statut</th>
                    <th>Titre</th>
                    <th>Tags</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Changer le statut</th>
                    <th>Editer</th>
                    <th>Supprimer</th>
                </tr>
                </thead>

                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->status }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            @foreach($post->tags as $tag)
                                {{ $tag->name }} ,
                            @endforeach
                        </td>
                        <td>{{ $post->date_start }}</td>
                        <td>{{ $post->date_end }}</td>
                        <td>
                            {!! Form::open(['id' => $post->id, 'class' => 'status', 'url' => 'conference/' . $post->id . '/status', 'method' => 'PUT']) !!}
                            @if($post->status == 'publish')
                                <button class="btn btn-default">
                                    Dé-publier
                                </button>
                            @else
                                <button class="btn btn-success">
                                    Publier
                                </button>
                            @endif
                            {!! Form::close() !!}
                        </td>
                        <td>
                            <button class="btn btn-default">
                                <a href="{{url('post/' . $post->id . '/edit')}}">Editer</a>
                            </button>
                        </td>
                        <td>
                            {!! Form::open(['class' => 'delete', 'url' => 'post/' . $post->id, 'method' => 'DELETE']) !!}
                            <button class="btn btn-danger">
                                Supprimer
                            </button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </article>
    @if(count($posts)<=0)
        <p>Désolé pas d'article sur le site pour l'instant</p>
    @endif
@endsection
