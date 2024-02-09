<!doctype html>
<html lang="en">
<head>
    <title>Edit Post</title>
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
<a href=" {{ route('posts.show' , $post->id) }} " class="btn btn-primary m-3 ">Back</a>   <br><br>

<form action="{{ route('posts.update', $post->id) }}" method="post">
    @csrf
    @method('PUT')
    Title: <input type="text" name="title" value="{{$post->title}}"><br><br>
    Content: <textarea name="content" cols="30" rows="10">{{$post->content}}</textarea><br><br>
    <input type="hidden" value="1" name="is_published">
{{--    <select name="category_id" class="form-control mb-3 w-auto">--}}
{{--            <option selected value="{{$post->id}}">{{$post->title}}</option>--}}
{{--    </select>--}}
    <button type="submit" class="btn btn-info">Edit post</button>
</form>
</body>
</html>
