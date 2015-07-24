@extends('front.master')

@section('title')
    {{$post->slug}}
@endsection

@section('content')
    <article class="news">
        <h2>{{$post->title}}</h2>
        <br/>
        <img class="left" src="{{ url('/asset/images/confs/' , [$post->thumbnail_link]) }}" >
        <p class="abstract"> {{$post->content}} </p>
        <p><a class="link-outside" href="{{$post->url_site}}" >site web de la conférence</a></p>
        <p class="link-keyword" >Mots clefs:
            @foreach($post->tags as $tag)
                <span class="tag">
                    <a href="{{url('tag/' . $tag->id)}} ">{{$tag->name}}</a>
                </span>,
            @endforeach
        </p>
        <p>Nombre de commentaires:
            <a href=" {{url('conference', [$post->id, $post->slug])}}#comment "> {{count($post->comments)}} </a>
        </p>
        <h3 class="date">début: {{$post->date_start}} fin: {{$post->date_end}}</h3>
    </article>

    <h2>Laissez un commentaire</h2>
    <br/>
    {!! Form::open([ 'url' => 'comment' ]) !!}
    {!! Form::label('email', 'Email:') !!}
    {!!Form::text('email', old('email'), ['class'=>'form-control']) !!}<br/><br/>
    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
    {!! Form::label('content', 'Commentaire:') !!}<br/>
    {!!Form::textarea('content', '' , ['cols'=> 30, 'rows' => 10]) !!}<br/><br/>
    {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
    {!!Form::submit('Valider', ['class'=>'btn', 'required']) !!}
    {!! Form::close() !!}<br/>

    <article>
        <h2 id="comment">Commentaires</h2>
        @if(count($post->comments)>0)
            <ul>
                @foreach($post->comments as $comment)
                    <li>{{$comment->email}}</li>
                    {{$comment->message}}<br/><br/>
                @endforeach
            </ul>
        @else
            <p>Désolé pas de commentaire</p>
        @endif
    </article>

@endsection


