@extends('dashboard.layouts.admin')

@section('content')

    {!! Form::open([ 'url' => 'post' ]) !!}
    <div class="form-group">
            {!! Form::label('title', 'Titre:', ['for' => 'title'] ) !!}
            {!!Form::text('title', old('title'), ['class'=>'button-primary', 'id'=>'title', 'required' ]) !!}<br/><br/>
            {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Texte:', ['for' => 'content']) !!}
        {!!Form::textarea('content', '' , ['cols'=> 30, 'rows' => 10, 'id'=>'content' ]) !!}<br/><br/>
        {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group">
        {!! Form::label('status', 'Status:', ['for' => 'title']) !!}
        Publié: {!!Form::radio('status', 'publish') !!}
        Dépublié: {!!Form::radio('status', 'unpublish') !!}
    </div>

    @if(count($categories)>0)
        <ul>
            @foreach($categories as $category)
                <li><label for="cat{{$category->id}}">{{$category->title}}</label>
                <input type="radio" name="category_id" value="{{$category->id}}" id="cat{{$category->id}}"> </li>
            @endforeach
        </ul>
    @endif

    <div class="form-group">
        {!!Form::submit('Create', ['class'=>'button-primary', 'required']) !!}
    </div>
    {!! Form::close() !!}
@endsection


