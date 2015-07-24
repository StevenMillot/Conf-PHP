@extends('layouts.admin')

@section('content')

    <ul>
        <li><a href="{{url('comment')}}">Gestion des commentaire</a></li>
        <li><a href="{{url('post')}}">Gestion des posts</a></li>
    </ul>

@endsection

