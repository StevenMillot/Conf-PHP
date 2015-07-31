@extends('front.master')

@section('title')
    Contact
@endsection

@section('content')
    <section id="post" >
        <aside>
            <h2>Laissez-nous un message</h2>
            <br>
            {!! Form::open([ 'url' => 'contact' ]) !!}

            {!! Form::label('email', 'Email* : ') !!}
            {!! Form::text('email', old('email'), ['class'=>'form-control']) !!}
            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}<br/>

            <h3>{!! Form::label('message', 'Commentaire* :') !!}</h3>
            {!! Form::textarea('message', '' , ['cols'=> 30, 'rows' => 7]) !!}<br/>
            {!! $errors->first('message', '<span class="help-block">:message</span>') !!}

            <p><em>(*) champs obligatoires</em></p>

            <p>Calculer la somme 5+8: <input type="text"></p>

            {!!Form::submit('Valider', ['class'=>'btn', 'required']) !!}
            {!! Form::close() !!}
        </aside>
    </section>
@endsection



