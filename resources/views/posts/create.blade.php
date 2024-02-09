<!doctype html>
<html lang="en">
<head>
    <title>Create Post</title>
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
{{--    {{dd($categories)}}--}}
    <div class="container">
    <a href=" {{ route('posts.index') }} " class="btn btn-info" style="text-decoration: none;">Back</a>   <br><br>

    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <input type="text" name="title" placeholder="Title"><br><br>
        <textarea name="content" cols="23" rows="5" placeholder="Content"></textarea><br><br>
        <input type="hidden" value="1" name="is_published">
        <label>Select category:</label>

        <select name="category_id" class="form-control mb-3 w-auto">
            <option selected>...</option>
            @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>


{{--        <select class="form-control mb-3 w-auto">--}}
{{--            @foreach($categories as $category)--}}
{{--                <option name="category_id" value="{{$category->id}}">{{$category->title}}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}

        <button type="submit" class="btn btn-success">Create post</button>
    </form>
    </div>
</body>
</html>
