<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main page</title>
</head>
<body>
    <a href=" {{ route('posts.create') }} ">Go to create page</a>

    @foreach($posts as $post)
        <a href="{{route('posts.show', $post->id)}}"><h3>{{$post->title}}</h3></a>
        <p>{{$post->content}}</p>
    @endforeach

</body>
</html>
