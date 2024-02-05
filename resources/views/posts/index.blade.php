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
                    <a href="{{ route('main.index') }}" style="text-decoration: none;">| Main |</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('main.about') }}" style="text-decoration: none;">| About Us |</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('main.contact') }}" style="text-decoration: none;">| Contact |</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('posts.create') }}" style="text-decoration: none;">| Create Post |</a>
                </li>
            </ul>

{{--            <li>--}}
{{--                <ul style="display: inline"><a href=" {{ route('main.index') }} ">Main</a></ul>--}}
{{--                <ul style="display: inline"><a href=" {{ route('main.about') }} ">About Us</a></ul>--}}
{{--                <ul style="display: inline"><a href=" {{ route('main.contact') }} ">Contact</a></ul>--}}
{{--                <ul style="display: inline"><a href=" {{ route('posts.create') }} ">Create Post</a></ul>--}}
{{--            </li>--}}

        </nav>
    </div>
{{--    <a href=" {{ route('posts.create') }} ">Go to create page</a>--}}
    <div class="container mt-4">
        @foreach($posts as $post)
            <a href="{{route('posts.show', $post->id)}}"><h3>{{$post->title}}</h3></a>
            <p>{{$post->content}}</p>
        @endforeach
    </div>


</body>
</html>
