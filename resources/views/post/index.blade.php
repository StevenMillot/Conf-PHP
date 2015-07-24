@extends('layouts.admin')

@section('title')
    {{$title or "Admin Post"}}
@endsection

@section('content')
<article class="post">
    <button><a href="{{url('post/create/')}}">Create</a></button>
    @if($posts)
                <table class="u-full-width">
                    <thead>
                    <tr>
                        <th>status</th>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->status}}</td>
                        <td>
                            <a href=" {{url('post', [$post->id])}}">{{$post->title}}</a>
                        </td>
                        <td>
                            <button><a href="{{url('post/' . $post->id .'/edit')}}">Edit</a></button>
                        </td>
                        <td>
                            {!! Form::open([ 'url' => 'post/' . $post->id, 'method' => 'DELETE', 'class' => 'form' ]) !!}
                            {!! Form::submit('delete') !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

    @else
        <p>Désolé pas d'article sur le site pour l'instant</p>
    @endif
</article>
@endsection

{{--
@section('footer')
    @parent
    <p>this is footer post</p>
@endsection
--}}
