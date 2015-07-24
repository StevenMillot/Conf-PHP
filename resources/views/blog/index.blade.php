@extends('front.master')

@section('title')
    ConfPHP
@endsection

@section('content')
    <h1>Conférences intéressantes autour du PHP</h1>
    @if($posts)
        @foreach($posts as $post)
            <article class="news">
                <h2>
                    <a href="{{url('conference', [$post->id, $post->slug])}}" class="link-post" >{{$post->title}}</a>
                </h2>
                <img class="left" src="{{ url('/asset/images/confs/' , [$post->thumbnail_link]) }}" >
                <p class="abstract">
                    {{$post->excerpt}}
                    <br>
                    <a href="{{url('conference', [$post->id, $post->slug])}} " class="link" >lire la suite...</a>
                    <br>
                </p>
                <p><a class="link-outside" href="{{$post->url_site}}" >site web de la conférence</a></p>
                <p class="link-keyword" >Mots clefs:
                    @foreach($post->tags as $tag)
                        <span class="tag">
                            <a href="{{url('tag/' . $tag->id)}} ">{{$tag->name}}</a>
                        </span>,
                    @endforeach
                </p>
                <p>Nombre de commentaires:
                    <a href="{{url('conference', [$post->id, $post->slug])}}#comment ">{{count($post->comments)}}</a>
                </p>
                <h3 class="date">début: {{$post->date_start}} fin: {{$post->date_end}}</h3>
            </article>
        @endforeach
    @else
        <p>Désolé pas d'article sur le site pour l'instant</p>
    @endif
@endsection



