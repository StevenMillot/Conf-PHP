@extends('front.master')

@section('title')
    Tag's post
@endsection

@section('content')
    <section class="tag">
    <h3>{{$tag->name}}</h3><br>
        @foreach($tag->posts as $post)
            <section class="post">
                <h2>{{$post->title}}</h2>
                <p>{{$post->content}}</p>
            </section>
        @endforeach
    </section>
@endsection