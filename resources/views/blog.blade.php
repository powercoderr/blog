<x-layout>
    <h1 id="blog-headline">Welcome to My Blog</h1>
    @foreach ($posts as $post)
        <article>
            <h1><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h1>
            <p>
                <a href="/category/{{ $post->category->name }}">
                    {{ $post->category->name }}
                </a>
            </p>
            <div>{{ $post->excerpt }}</div>
        </article>     
    @endforeach
</x-layout>