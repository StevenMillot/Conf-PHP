

@extends('layouts.admin')

@section('content')
{{-- old('title') recupere la dernier information du formulaire," si refresh"--}}

    {!! Form::open([ 'url' => 'post/'. $post->id, 'method'=>'PUT']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Titre:', ['for' => 'title'] ) !!}
        {!!Form::text('title', $post->title, ['class'=>'button-primary', 'id'=>'title', 'required' ]) !!}<br/><br/>
        {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Texte:', ['for' => 'content']) !!}
        {!!Form::textarea('content', $post->content , ['cols'=> 30, 'rows' => 10, 'id'=>'content' ]) !!}<br/><br/>
        {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group">
        {!! Form::label('status', 'Status:', ['for' => 'title']) !!}
        Publié: {!!Form::radio('status', 'publish', ($post->status == 'publish')) !!}
        Dépublié: {!!Form::radio('status', 'unpublish', ($post->status == 'unpublish')) !!}
    </div>


        <ul>
            @foreach($categories as $category)
                <li><label for="cat{{$category->id}}">{{$category->title}}</label>
                {!! Form::radio("category_id", $category->id, ($post->category->id == $category->id)) !!}

            @endforeach
        </ul>

    <div class="form-group">
        {!!Form::submit('Update', ['class'=>'button-primary', 'required']) !!}
    </div>
    {!! Form::close() !!}
@endsection
