@extends('posts.layouts.main')
@section('content')

<form action="{{ route('posts.update', $post->id) }}" method="post">
    @csrf
    @method('PUT')
    Title: <input type="text" name="title" value="{{$post->title}}"><br><br>
    Content: <textarea name="content" cols="30" rows="10">{{$post->content}}</textarea><br><br>
    <input type="hidden" value="1" name="is_published">

    <select name="category_id" class="form-control mb-3 w-auto">
        @foreach($categories as $cat)
            <option @if($cat->id == $post->category_id) selected @endif value="{{$cat->id}}">{{$cat->title}}</option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-info">Edit post</button>
</form>

@endsection
