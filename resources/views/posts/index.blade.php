<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main page</title>
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</head>
<body>

    <div class="container py-3">
        <nav class="row">
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a href="{{ route('main.index') }}" style="text-decoration: none;"><h4>| Main |</h4></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('main.about') }}" style="text-decoration: none;"><h4>| About Us |</h4></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('main.contact') }}" style="text-decoration: none;"><h4>| Contact |</h4></a>
                </li>

            </ul>
        <div>


        <div class="col col-3 ">
            <a href="{{route('posts.index')}}">All posts</a>
            @foreach($categories as $cat)
                <a href="{{route('posts.category', $cat->id)}}" >{{$cat->title}}</a>
            @endforeach
        </div>
    <div class="container mt-4">

        <button class="btn btn-info mb-3">
            <a href="{{ route('posts.create') }}" style="text-decoration: none;" > Create Post </a>
        </button>

{{--        {{dd($posts)}}--}}

        @foreach($posts as $post)
{{--            <a href="{{route('posts.show', $post->id)}}"><h3>{{$post->title}}</h3></a>--}}
{{--            <p>{{$post->content}}</p>--}}

            <div class="card mb-3" style="width: 25rem;">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->content}}</p>
                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">Read post</a>
                </div>
            </div>
        @endforeach
    </div>




</body>
</html>
