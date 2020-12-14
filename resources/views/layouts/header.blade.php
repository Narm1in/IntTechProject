<!DOCTYPE HTML>
<html>

<head>
    <title>Blog</title>
    <meta name="description" content="website description" />
    <meta name="keywords" content="website keywords, website keywords" />
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/')}}/style.css" title="style" />
</head>

<body>
<div id="main">
    <div id="header">
        <div id="logo">
            <div id="logo_text">
                <!-- class="logo_colour", allows you to change the colour of the text -->
                <h1><a href="/">textured<span class="logo_colour">green</span></a></h1>
                <h2>Simple. Contemporary. Website Template.</h2>
            </div>
        </div>
        <div id="menubar">
            <ul id="menu">
                <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
                <li class="{{request()->is('/') ? 'selected' : ''}}"><a href="/">Home</a></li>

                @foreach($pages as $page)
                    <li class="{{request()->segment(1) == $page->slug ? 'selected' : ''}}"><a href="{{route('page', $page->slug)}}">{{$page->title}}</a></li>
                @endforeach

                <li><a href="/contact">Contact Us</a></li>
            </ul>
        </div>
