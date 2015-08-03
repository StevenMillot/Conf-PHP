@extends('front.master')

@section('content')

<article id="login" class="login">
    {!! Form::open([ 'url' => 'auth/login' ]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Login:') !!}
        {!!Form::text('name', old('name'), ['class'=>'form-control', 'required']) !!}<br/>
        {!! $errors->first('name', ':message') !!}<br/>

        {!! Form::label('password', 'Password:') !!}
        {!!Form::password('password', null , ['class'=>'form-control', 'required']) !!}<br/>
        <br/>

        {!! Form::label('remember', 'Remember me:') !!}
        {!!Form::checkbox('remember', 1, false, ['class'=>'form-control']) !!}<br/>
        {!!Form::submit('Valider', ['class'=>'btn', 'required']) !!}
    </div>
    {!! Form::close() !!}
</article>
@endsection