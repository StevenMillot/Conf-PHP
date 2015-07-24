@extends('layouts.admin')

{{--@section('title','Bienvenue a toi')--}}
@section('title')
    {{$title or 'post'}}
@endsection

@section('content')
    <section class="post">
        <h2>{{$post->title}}</h2>
        <p>{{$post->content}}</p>
        <p>Auteur: <a href=" {{($post->user)? url('user/' . $post->user->id) : url('post/')}} "> {{ ($post->user)? $post->user->name : "Anonymous"}}</a></p>
    </section>
@endsection