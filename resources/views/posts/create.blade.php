<!doctype html>
<html lang="en">
<head>
    <title>Create Post</title>
</head>
<body>
    <a href=" {{ route('posts.index') }} ">Go to index page</a>   <br><br>

    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        Title: <input type="text" name="title"><br><br>
        Content: <textarea name="content" cols="30" rows="10"></textarea><br><br>
        <input type="hidden" value="1" name="is_published">
        <button type="submit">Create post</button>
    </form>
</body>
</html>
