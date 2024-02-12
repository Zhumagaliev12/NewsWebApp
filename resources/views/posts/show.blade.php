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
        <form action="" method="post">
            <div>
                <label for="comment" class="visually-hidden"></label>
                <textarea class="form-control form-control-sm border border-2 rounded-1"
                          id="comment" style="height: 50px"  placeholder="Add a comment..."
                          minlength="3" maxlength="255" required>
                </textarea>
            </div>
            <footer class="card-footer bg-transparent border-0 text-end">
{{--                <button class="btn btn-link btn-sm me-2 text-decoration-none">Cancel</button>--}}
                <button type="submit" class="btn btn-primary btn-sm">Add comment</button>
            </footer>
        </form>
    </div>

@endsection




