@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mt-2">
                        <label for="titleInput">Title</label>
                        <input type="text" class="form-control" id="titleInput" name="title" value="{{$post->title}}">
                        @error('title')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="contentInput">Content</label>
                        <textarea class="form-control" id="contentInput" rows="3" name="content">{{$post->content}}</textarea>
                        @error('content')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="hidden" value="1" name="is_published">

                    <div class="form-group mt-2">
                        <label for="categoryInput">Category</label>
                        <select class="form-control" name="category_id" id="categoryInput">
                            @foreach($categories as $category)
                                <option @if($category->id == $post->category_id) selected @endif value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="fileInput">Image</label>
                        <input type="file" class="form-control" id="fileInput" name="image">
                        @error('image')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    @if($post->image)
                        <div class="form-group mt-2">
                            <label for="currentImage">Current Image</label><br>
                            <img src="{{ $post->image }}" id="currentImage" alt="Current Image" style="max-width: 300px;">
                        </div>
                    @endif

                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-info">Edit post</button>
                    </div>

                </form>
            </div>
        </div>
    </div>



@endsection
