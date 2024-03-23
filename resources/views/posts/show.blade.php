@extends('layouts.app')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12">
                <article>
                    <header class="mb-4">
                        <h1 class="fw-bolder mb-1">{{$post->title}}</h1>
                        <div class="text-muted fst-italic mb-2">{{$post->created_at}}</div>
                        <div class="text-muted fst-italic mb-2">Author: {{$post->user->name}}</div>
                        <a class="badge bg-secondary text-decoration-none link-light"
                           href="#!">{{$post->category->title}}</a>
                    </header>
                    <figure class="mb-4"><img class="img-fluid rounded"
                                              src="{{$post->image}}"/>
                    </figure>
                    <section class="mb-2">
                        <p class="fs-5 mb-2">{{$post->content}}</p>
                    </section>

                    {{--                    @can('view', $post)--}}
                    {{--                        @if(Auth::user()->id == $post->user_id)--}}
                    {{--                            <a  href="{{route('posts.edit', $post->id)}} " class="btn btn-info mt-2">Edit</a>--}}
                    {{--                            <form action="{{route('posts.destroy',$post->id)}}" method="post">--}}
                    {{--                                @csrf--}}
                    {{--                                @method('DELETE')--}}
                    {{--                                <button type="submit" class="btn btn-danger mt-2">Delete</button>--}}
                    {{--                            </form>--}}
                    {{--                        @endif--}}
                    {{--                    @endcan--}}

                    @can('view', $post)
                        {{--                        @if(Auth::user()->id == $post->user_id)--}}
                        <a href="{{route('posts.edit', $post->id)}} " class="btn btn-info mb-1">Edit</a>
                        <form action="{{route('posts.destroy',$post->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mb-2">Delete</button>
                        </form>
                        {{--                        @endif--}}
                    @endcan
                </article>


                @if($avgRating != 0)
                    <h4 style=" color: {{$avgRating < 2.5 ? 'yellow' : 'green' }}" class="mt-3">
                        Rating:{{$avgRating}}</h4>
                @endif

                @auth()

                    <form action="{{route('posts.rate', $post->id)}}" method="post"
                          class="d-flex align-items-center w-25">
                        @csrf
                        <select class="form-select" name="rating">
                            @for($i=0; $i<=5; $i++)
                                <option {{$myRating==$i ? 'selected' : ''}} value="{{$i}}">
                                    {{$i==0 ? 'Not rated' : $i}}
                                </option>
                            @endfor
                        </select>
                        <button class="btn btn-outline-primary mx-2" type="submit">Rate</button>
                    </form>

                @endauth


                <section class="my-5">
                    <div class="card bg-light col-lg-8">
                        <div class="card-body">

                            @auth()
                                <form action="{{route('show.comment')}}" method="post">
                                    @csrf
                                    <div>
                                        <input name="post_id" value="{{$post->id}}" type="hidden">
                                        <label for="comment" class="visually-hidden"></label>
                                        <textarea class="form-control" rows="3"
                                                  placeholder="Join the discussion and leave a comment!"
                                                  id="comment" name="content" minlength="1"
                                                  maxlength="255"></textarea>
                                    </div>
                                    <footer class="card-footer bg-transparent border-0 text-end">
                                        <button type="submit" class="btn btn-primary btn-sm">Add comment
                                        </button>
                                    </footer>
                                </form>
                            @endauth
                        </div>

                        <div class="card-body">
                            <div class="container ">
                                <h3>Comments:</h3>
                                <div class="row d-flex justify-content-center ">

                                    @foreach($post->comments as $comment)
                                        @if($comment->post_id == $post->id)
                                            <div class="d-flex m-3">
                                                <div class="flex-shrink-0"><img class="rounded-circle"
                                                                                src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"
                                                                                alt="..."/></div>
                                                <div class="ms-3">
                                                    <div class="fw-bold"><h5>{{$comment->user->name}}</h5></div>
                                                    <p>{{$comment->content}}</p>
                                                    <small class="fst-italic">{{$comment->created_at}}</small>
                                                </div>

                                                @auth()
                                                    <div class="m-auto">
                                                        <form
                                                            action="{{route('comment.destroy', $comment->id)}}"
                                                            method="post">
                                                            @csrf
                                                            <input name="post_id" value="{{$post->id}}"
                                                                   type="hidden">
                                                            @if(Auth::user()->id == $comment->user_id)
                                                                <button class="btn btn-danger mb-1"
                                                                        type="submit">
                                                                    Delete
                                                                </button>
                                                            @endif
                                                        </form>
                                                    </div>
                                                @endauth
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    </div>
@endsection




