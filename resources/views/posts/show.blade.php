@extends('layouts.app')

@section('title', '| View Post')

@section('content')

    <div class="container">

        <h1>{{ $post->title }}</h1>
        <hr>
        <p class="lead">{{ $post->body }} </p>
        <hr>
        {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id] ]) !!}
        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

        @if( auth()->user()->can('Edit Post') || auth()->user()->can('Administer roles & permissions') )
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info" role="button">Edit</a>
        @endif

        @if( auth()->user()->can('Delete Post') || auth()->user()->can('Administer roles & permissions') )
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        @endif
        {!! Form::close() !!}
    </div>
@endsection