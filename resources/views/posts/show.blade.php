@extends('posts.layouts.main')
@section('content')
    <div class="container">
        <div class="mt-2">
        <h3>{{$post->title}}</h3>
        <p>{{$post->content}}</p>
        </div>
        <a  href="{{route('posts.edit', $post->id)}} " class="btn btn-info mt-2">Edit</a>
        <form action="{{route('posts.destroy',$post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-2">Delete</button>
        </form>
    </div>

    <div class="card-body py-1 mt-2" style="width: 300px">
        <form action="{{route('posts.comment')}}" method="post">
        @csrf
            <div>
                <input name="post_id" value="{{$post->id}}" type="hidden">
                <label for="comment" class="visually-hidden"></label>
                <textarea class="form-control form-control-sm border border-2 rounded-1"
                          id="comment" name="content" style="height: 50px"
                          minlength="1" maxlength="255">
                </textarea>
            </div>
            <footer class="card-footer bg-transparent border-0 text-end">
{{--                <button class="btn btn-link btn-sm me-2 text-decoration-none">Cancel</button>--}}
                <button type="submit" class="btn btn-primary btn-sm">Add comment</button>
            </footer>
        </form>
    </div>

{{--    <section style="background-color: #eee;">--}}
    <div class="card-body mt-2" style="width: 500px">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <img src="">
                        <div>
                            <h6 class="fw-bold text-primary mb-1">Ghost</h6>
                            <p class="text-muted small mb-0"> Shared publicly -  Jan 2020 </p>
                        </div>
                    </div>
                    <p class="mt-3 mb-4 pb-2">Content</p>
                    <div class="small d-flex justify-content-start">
                        <a href="#!" class="d-flex align-items-center me-3">
                            <i class="far fa-thumbs-up me-2"></i>
                            <p class="mb-0">Like</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    </section>--}}

@endsection




