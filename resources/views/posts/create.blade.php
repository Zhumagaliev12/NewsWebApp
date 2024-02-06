<!doctype html>
<html lang="en">
<head>
    <title>Create Post</title>
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
    <div class="container">
    <a href=" {{ route('posts.index') }} " class="btn btn-info" style="text-decoration: none;">Go to index page</a>   <br><br>

    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <input type="text" name="title" placeholder="Title"><br><br>
        <textarea name="content" cols="30" rows="10" placeholder="Content"></textarea><br><br>
        <input type="hidden" value="1" name="is_published">
        <button type="submit" class="btn btn-success">Create post</button>
    </form>
    </div>
</body>
</html>
