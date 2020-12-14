@extends('layouts.master')
@section('title','Page')


@section('content')
    <div class="post-container">

        <h1 class="post-header">{{$content->title}}</h1>
        <p class="post-text">{{$content->content}}</p>

    </div>


@endsection
