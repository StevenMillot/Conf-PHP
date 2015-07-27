@extends('front.master')

@section('content')

<article id="login" class="login">
    {!! Form::open([ 'url' => 'auth/login' ]) !!}
    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!!Form::email('email', old('email'), ['class'=>'form-control', 'required']) !!}<br/><br/>
        {!! $errors->first('email', ':message') !!}
        {!! Form::label('password', 'Password:') !!}
        {!!Form::password('password', null , ['class'=>'form-control', 'required']) !!}<br/><br/>
        {!! Form::label('remember', 'Remember me:') !!}
        {!!Form::checkbox('remember', 1, false, ['class'=>'form-control']) !!}<br/>
        {!!Form::submit('Valider', ['class'=>'btn', 'required']) !!}
    </div>
    {!! Form::close() !!}
</article>
@endsection