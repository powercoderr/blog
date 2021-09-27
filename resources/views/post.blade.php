<x-layout>
    <article>
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->category->name }}</p>
        <div>{!! $post->body !!}</div>
        <a href="/">Back to home ...</a>
    </article>
</x-layout>