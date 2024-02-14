@extends('posts.layouts.main')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12">
                <article>
                    <header class="mb-4">
                        <h1 class="fw-bolder mb-1">{{$post->title}}</h1>
                        <div class="text-muted fst-italic mb-2">{{$post->created_at}}</div>

{{--                        <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>--}}
{{--                        <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>--}}
                    </header>
                    <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>
                    <section class="mb-5">
                        <p class="fs-5 mb-4">{{$post->content}}</p>
                    </section>
                    <a  href="{{route('posts.edit', $post->id)}} " class="btn btn-info mt-2">Edit</a>
                    <form action="{{route('posts.destroy',$post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-2">Delete</button>
                    </form>
                </article>
                <section class="my-5">
                        <div class="card bg-light col-lg-8">
                        <div class="card-body">
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
                        </div>
                        <div class="card-body mt-2" style="width: 500px">
                            <h6>Comments:</h6>
                            <div class="container ">
                                <div class="row d-flex justify-content-center ">
                                    @foreach($comments as $comment)
                                        @if($comment->post_id == $post->id)
                                            <div class="d-flex m-3">
                                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                                <div class="ms-3">
                                                    <div class="fw-bold">Commenter Name</div>
                                                    <p>{{$comment->content}}</p>
                                                </div>
                                                <div class="m-auto">
                                                    <form action="{{route('comment.destroy', $comment->id)}}" method="post">
                                                        @csrf
                                                        <input name="post_id" value="{{$post->id}}" type="hidden">
                                                        <button class="btn btn-danger mb-1" type="submit">Delete</button>
                                                    </form>
                                                </div>
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




