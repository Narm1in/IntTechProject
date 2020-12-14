@extends('layouts.master')

@section('content')
<div id="site_content">
    <div class="sidebar">
        <!-- insert your sidebar items here -->
        <h3>Categories</h3>
        <ul>
            @foreach($categories as $category)
            <li><a href="{{route('category', $category->slug)}}">{{$category->name}}</a></li>
            @endforeach
        </ul>

    </div>
    @if(count($articles))
    @foreach($articles as $article)
    <div id="content">
        <!-- insert the page content here -->
        <h1 class="title"><a href="{{route('post',$article->slug)}}">{{$article->title}}</a></h1>
        <p class="meta">Posted by<a href="#">{{$article->author}}</a> {{"on ".\Illuminate\Support\Carbon::parse($article->created_at)->format('F j,Y') }}
            <span><i>Category:</i></span><a href="{{route('category', $article->getCategory->slug)}}">{{$article->getCategory->name}}</a>
        </p>
        <p>{!! $article->description !!}</p>
    </div>
    @endforeach
    @else
        <div>No Articles Found</div>
    @endif
    {{$articles->links()}}
</div>
@endsection
