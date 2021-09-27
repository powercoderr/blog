<x-layout>
    <article>
        <h1>{{ $post->title }}</h1>
        <p>
            <a href="/category/{{ $post->category->name }}">
                {{ $post->category->name }}
            </a>
        </p>
        <div>{!! $post->body !!}</div>
        <a href="/">Back to home ...</a>
    </article>
</x-layout>