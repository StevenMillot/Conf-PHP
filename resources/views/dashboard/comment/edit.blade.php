@extends('dashboard.layouts.admin')

@section('content')
    <article class="dashboard">
        <h1 class="container-fluid">Modifier</h1><br>

        <div class="container-fluid">
            {!! Form::open(['url'=>'comment/'.$comment->id , 'method' => 'PUT']) !!}

            <div class="form-group">
                {!! Form::label('email', 'Email :',['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
                <div class="col-lg-7">
                    {!! Form::text('email', $comment->email, ['class' => 'form-control']) !!}
                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('message', 'Message :',['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
                <div class="col-lg-7">
                    {!! Form::textarea('message', $comment->message, ['class' => 'form-control']) !!}
                    {!! $errors->first('message', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-9 col-lg-1"><br>
                    {!! Form::submit('Modifier', ['class' => 'form-control btn btn-success']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </article>
@endsection
