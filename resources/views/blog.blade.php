<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <title>Blog</title>
</head>
<body>
    <h1 id="blog-headline">Welcome to My Blog</h1>
    @foreach ($posts as $post)
        <article>
            <h1><a href="/blog/posts/{{ $post->slug }}">{{ $post->title }}</a></h1>
            <div>
                {{ $post->excerpt }}
            </div>
        </article>     
    @endforeach

</body>
</html>