@extends('layouts.app')
@section('content')

    <div class="container mt-4">
        <div class="row">

            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif

            <div class="col-lg-8 d-flex flex-wrap" >
                @foreach($posts as $post)
                    <div class="card col-lg-5 mx-4 mb-4" style="background-color: #dae4f5">
                        <img class="card-img-top h-100" src="{{$post->image}}"/>
                        <div class="card-body">
                            <div class="small text-muted">{{$post->created_at}}</div>
                            <h2 class="card-title text-nowrap overflow-hidden text-truncate">{{$post->title}}</h2>
                            <p class="card-text" style="height: 50px;  overflow: hidden;">{{$post->content}}</p>
                            <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">{{ __('messages.readPost') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-lg-4">
                <form action="{{route('posts.search')}}" method="get">
                    <div class="card mb-4">
                        <div class="card-header">{{ __('messages.search') }}</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" name="search" placeholder="{{ __('messages.search.word') }}"
                                       aria-label="Enter search term..." aria-describedby="button-search"/>
                                <button class="btn btn-primary" id="button-search" type="submit">{{ __('messages.search.button') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

        <div class="d-flex justify-content-center align-items-center w-75 p-3">
            {{$posts -> links()}}
        </div>

@endsection


