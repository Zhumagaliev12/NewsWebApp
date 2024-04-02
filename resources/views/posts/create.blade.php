@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mt-2">
                        <label for="titleInput">{{ __('messages.title') }}</label>
                        <input type="text" class="form-control" id="titleInput" name="title" placeholder="{{ __('messages.enterTitle') }}">
                        @error('title')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="contentInput">{{ __('messages.content') }}</label>
                        <textarea class="form-control" id="contentInput" rows="3" name="content" placeholder="{{ __('messages.enterContent') }}"></textarea>
                        @error('content')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="form-group mt-2">
                        <label for="categoryInput">{{ __('messages.category') }}</label>
                        <select class="form-control" name="category_id" id="categoryInput">
                            <option selected>...</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->{'title_'. app()->getLocale()} }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="fileInput">{{__('messages.image')}}</label>
                        <input type="file" class="form-control" id="fileInput" name="image">
                        @error('image')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="hidden" value="1" name="is_published">
{{--                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id">--}}

                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-success">{{__('messages.createPost')}}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

