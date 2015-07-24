@extends('layouts.admin')

@section('content')
    <button><a href="{{url('comment/create/')}}">Create</a></button><br/><br/>
    {{-- {!! Form::button('Create', ) !!} --}}

    @if(Session::has('message'))
        <div class="alert">{{Session::get('message')}}</div>
    @endif

    @if(count($comments)>0)
        <ul>
                @foreach($comments as $comment)
                    <li>
                        {{$comment->email}} <button><a href="{{url('comment/' . $comment->id .'/edit')}}">Edit</a></button>
                        {!! Form::open([ 'url' => 'comment/' . $comment->id, 'method' => 'DELETE', 'class' => 'form' ]) !!}
                        {!! Form::submit('delete') !!}
                        {!! Form::close() !!}<br/>
                    </li>
                @endforeach
        </ul>
    @else
    <p>Désolé pas de commentaire</p>
    @endif

@endsection

