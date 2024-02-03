<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main page</title>
</head>
<body>
    <div>
        <nav>
            <li>
                <ul style="display: inline"><a href=" {{ route('main.index') }} ">Main</a></ul>
                <ul style="display: inline"><a href=" {{ route('main.about') }} ">About Us</a></ul>
                <ul style="display: inline"><a href=" {{ route('main.contact') }} ">Contact</a></ul>
                <ul style="display: inline"><a href=" {{ route('posts.create') }} ">Create Post</a></ul>
            </li>
        </nav>
    </div>
{{--    <a href=" {{ route('posts.create') }} ">Go to create page</a>--}}

    @foreach($posts as $post)
        <a href="{{route('posts.show', $post->id)}}"><h3>{{$post->title}}</h3></a>
        <p>{{$post->content}}</p>
    @endforeach

</body>
</html>
