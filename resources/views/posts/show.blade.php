<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main page</title>
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
    <a href=" {{ route('posts.index') }} " class="btn btn-primary m-3 ">Go to index page</a>

    <h3>{{$post->title}}</h3>
    <p>{{$post->content}}</p>

    <a  href="{{route('posts.edit', $post->id)}} " class="btn btn-info m-2">Edit</a>

    <form action="{{route('posts.destroy',$post->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger m-2">Delete</button>
    </form>

</body>
</html>
