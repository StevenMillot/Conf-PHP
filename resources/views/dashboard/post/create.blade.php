@extends('dashboard.layouts.admin')

@section('content')
    <article>
        <h1>Ajouter une conférence</h1><br>
        <div class="container-fluid">

            {!! Form::open(['url' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}

            <div class="form-group">
                {!! Form::label('title', 'Titre *', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
                <div class="col-lg-7">
                    {!! Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Titre']) !!}
                    {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('slug', 'Slug *', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
                <div class="col-lg-7">
                    {!! Form::text('slug', '', ['class' => 'form-control', 'placeholder' => 'Nom de référencement afficher dans l\'url']) !!}
                    {!! $errors->first('slug', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('excerpt', 'Résumé *', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
                <div class="col-lg-7">
                    {!! Form::text('excerpt', '', ['class' => 'form-control', 'maxlength' => '255', 'placeholder' => 'Résumé (255 caractères max)']) !!}
                    {!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('content', 'Description *', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
                <div class="col-lg-7">
                    {!! Form::textarea('content', '', ['class' => 'form-control', 'placeholder' => 'Description']) !!}
                    {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('url_site', 'Site web', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
                <div class="col-lg-7">
                    {!! Form::text('url_site', '', ['class' => 'form-control', 'placeholder' => 'http://www.conference.com']) !!}
                    {!! $errors->first('url_site', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('date_start', 'Date de début *', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
                <div class="col-lg-7">
                    {!! Form::text('date_start', '', ['class' => 'form-control', 'placeholder' => 'Veuillez saisir la date et l\'heure dans se format : 2015-05-17 09:45:00']) !!}
                    {!! $errors->first('date_start', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('date_end', 'Date de fin *', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
                <div class="col-lg-7">
                    {!! Form::text('date_end', '', ['class' => 'form-control', 'placeholder' => 'Veuillez saisir la date et l\'heure au format : 2015-05-19 18:30:00']) !!}
                    {!! $errors->first('date_end', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('tags', 'Tags *', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
                <div class="col-lg-7">
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('tags[]', $tag->id) !!}
                                {{ $tag->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('thumbnail_link', 'Image *', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
                <div class="col-lg-7">
                    <div class="input-group ">
                        {!! Form::file('thumbnail_link') !!}
                        {!! $errors->first('thumbnail_link', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-2">
                    <p><em>* Champ obligatoire</em></p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-9 col-lg-1">
                    {!! Form::submit('Créer', ['class' => 'form-control btn btn-success']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </article>
@endsection


