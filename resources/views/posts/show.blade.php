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
                        <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{$post->category->title}}</a>
                    </header>
                    <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>
                    <section class="mb-5">
                        <p class="fs-5 mb-4">{{$post->content}}</p>
                    </section>

                    @auth()
                        @if($post->user->id == $post->user_id)
                            <a  href="{{route('posts.edit', $post->id)}} " class="btn btn-info mt-2">Edit</a>
                            <form action="{{route('posts.destroy',$post->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mt-2">Delete</button>
                            </form>
                        @endif
                    @endauth


                </article>
                <section class="my-5">
                        <div class="card bg-light col-lg-8">
                        <div class="card-body">

                            @auth()
                                <form action="{{route('show.comment')}}" method="post">
                                    @csrf
                                    <div>
                                        <input name="post_id" value="{{$post->id}}" type="hidden">
                                        <label for="comment" class="visually-hidden"></label>
                                        <textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"
                                          id="comment" name="content" minlength="1" maxlength="255"></textarea>
                                    </div>
                                    <footer class="card-footer bg-transparent border-0 text-end">
                                        <button type="submit" class="btn btn-primary btn-sm">Add comment</button>
                                    </footer>
                                </form>
                            @endauth

                        </div>
                        <div class="card-body mt-2" style="width: 500px">
                            <h6>Comments:</h6>
                            <div class="container ">
                                <div class="row d-flex justify-content-center ">

                                    @foreach($post->comments as $comment)
                                        @if($comment->post_id == $post->id)
                                            <div class="d-flex m-3">
                                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                                <div class="ms-3">

{{--                                                    <div class="fw-bold">{{$comment->user->name}}</div>--}}
                                                    <p>{{$comment->content}}</p>
                                                    <small>{{$comment->created_at}}</small>

                                                    {{--                                                    @foreach(\App\Models\User::all() as $user)--}}
                                                    {{--                                                        <div class="fw-bold">@if($user->id == $comment->user_id) {{$user->name}} @endif </div>--}}
                                                    {{--                                                    @endforeach--}}

                                                </div>

                                                @auth()
                                                    <div class="m-auto">
                                                        <form action="{{route('comment.destroy', $comment->id)}}" method="post">
                                                            @csrf
                                                            <input name="post_id" value="{{$post->id}}" type="hidden">
                                                            @if(Auth::user()->id == $comment->user_id)
                                                                <button class="btn btn-danger mb-1" type="submit">Delete</button>
                                                            @endif
                                                        </form>
                                                    </div>
                                                @endauth
                                            </div>
                                       @endif
                                  @endforeach

{{--                                    @foreach($post->comments as $comment)--}}

{{--                                        <p>{{$comment->user->name}}</p>--}}
{{--                                        <p>{{$comment->created_at}}</p>--}}
{{--                                        <p>{{$comment->content}}</p>--}}
{{--                                    @endforeach--}}

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




