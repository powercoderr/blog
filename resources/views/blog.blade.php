@extends('layout')
@section('content')
    <h1 id="blog-headline">Welcome to My Blog</h1>
    @foreach ($posts as $post)
        <article>
            <h1><a href="/blog/posts/{{ $post->slug }}">{{ $post->title }}</a></h1>
            <div>{{ $post->excerpt }}</div>
        </article>     
    @endforeach
@endsection