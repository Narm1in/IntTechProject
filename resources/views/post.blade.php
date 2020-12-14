@extends('layouts.master')
@section('title',$post->title)


@section('content')
    <div class="post-container">

        <h1 class="post-header">{{$post->title}}</h1>
        <p class="post-text">{{$post->content}}</p>

    </div>


@endsection
