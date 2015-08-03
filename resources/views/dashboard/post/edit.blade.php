

@extends('dashboard.layouts.admin')

@section('content')
    <article class="dashboard">
        <h1 class="container-fluid">Modifier {{$post->title}}</h1><br>

        <div class="container-fluid">
            {!! Form::open(['url' => 'post/' . $post->id, 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal']) !!}

            <div class="form-group">
                {!! Form::label('title', 'Titre *', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
                <div class="col-lg-7">
                    {!! Form::text('title', $post->title, ['class' => 'form-control']) !!}
                    {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('slug', 'Slug *', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
                <div class="col-lg-7">
                    {!! Form::text('slug', $post->slug, ['class' => 'form-control', 'placeholder' => 'Nom de référencement afficher dans l\'url']) !!}
                    {!! $errors->first('slug', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('excerpt', 'Résumé *', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
                <div class="col-lg-7">
                    {!! Form::text('excerpt', $post->excerpt, ['class' => 'form-control', 'maxlength' => '255']) !!}
                    {!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('content', 'Description *', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
                <div class="col-lg-7">
                    {!! Form::textarea('content', $post->content, ['class' => 'form-control']) !!}
                    {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('url_site', 'Site web', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
                <div class="col-lg-7">
                    {!! Form::text('url_site', $post->url_site, ['class' => 'form-control', 'placeholder' => 'http://www.conference.com']) !!}
                    {!! $errors->first('url_site', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('date_start', 'Date de début *', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
                <div class="col-lg-7">
                    <input name="date_start" id="datetimepickerEditStart" type="text" class="form-control"  value="{{ $post->date_start }}" placeholder="Cliquez pour saisir une date">
                    {{--{!! Form::text('date_start', $post->date_start, ['class' => 'form-control', 'placeholder' => 'Veuillez saisir la date et l\'heure au format : 17-05-2015 09:45:00']) !!}--}}
                    {!! $errors->first('date_start', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('date_end', 'Date de fin *', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
                <div class="col-lg-7">
                    <input name="date_end" id="datetimepickerEditEnd" type="text" class="form-control"  value="{{ $post->date_start }}" placeholder="Cliquez pour saisir une date">
                    {{--{!! Form::text('date_end', $post->date_end, ['class' => 'form-control', 'placeholder' => 'Veuillez saisir la date et l\'heure au format : 17-05-2015 09:45:00']) !!}--}}
                    {!! $errors->first('date_end', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('tags', 'Tags', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
                <div class="col-lg-7">
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('tags[]', $tag->id, $post->tags->where('id', $tag->id)->count() != 0) !!}
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
                    {!! Form::submit('Modifier', ['class' => 'form-control btn btn-success']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </article>
@endsection
