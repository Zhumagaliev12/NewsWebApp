@extends('posts.layouts.main')
@section('content')
    <div class="container">
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
        <button type="submit" class="btn btn-success">Create post</button>
    </form>
    </div>
@endsection

