@extends('posts.layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="{{ route('posts.store') }}" method="post">
                    @csrf

                    <div class="form-group mt-2">
                        <label for="titleInput">Title</label>
                        <input type="text" class="form-control" id="titleInput" name="title" placeholder="Enter title ...">
                        @error('title')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="contentInput">Content</label>
                        <textarea class="form-control" id="contentInput" rows="3" name="content" placeholder="Enter content ..."></textarea>
                        @error('content')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group mt-2">
                        <label for="categoryInput">Category</label>
                        <select class="form-control" name="category_id" id="categoryInput">
                            <option selected>...</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="hidden" value="1" name="is_published">

                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-success">Create post</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

