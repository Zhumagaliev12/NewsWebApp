<!doctype html>
<html lang="en">
<head>
    <title>Edit Post</title>
</head>
<body>
<a href=" {{ route('posts.index') }} ">Go to index page</a>   <br><br>

<form action="{{ route('posts.update', $post->id) }}" method="post">
    @csrf
    @method('PUT')
    Title: <input type="text" name="title" value="{{$post->title}}"><br><br>
    Content: <textarea name="content" cols="30" rows="10">{{$post->content}}</textarea><br><br>
    <input type="hidden" value="1" name="is_published">
    <button type="submit">Edit post</button>
</form>
</body>
</html>
