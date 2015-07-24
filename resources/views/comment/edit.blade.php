@extends('layouts.admin')

@section('content')

    {!! Form::open([ 'url' => 'comment/' . $comment->id, 'method' => 'PUT' ]) !!}
    <p>{!! Form::text('email', $comment->email) !!}</p>
    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
    <p>{!! Form::textarea('content', $comment->content) !!}</p>
    {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
    <p>{!! Form::submit('update') !!}</p>
    {!! Form::close() !!}<br/>

@endsection
