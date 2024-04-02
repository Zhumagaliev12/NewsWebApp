@extends('layouts.adm')

@section('content')
    <h4>POSTS:</h4>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Category</th>
            <th scope="col">Author</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0; $i<count($posts); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$posts[$i]->title}}</td>
                <td>{{$posts[$i]->content}}</td>
                <td>{{$posts[$i]->category->{'title_'. app()->getLocale()} }}</td>
                <td>{{$posts[$i]->user->name}}</td>
                <td>
                    <form action="
                    @if($posts[$i]->is_published == 1)
                        {{route('admin.posts.publish', $posts[$i]->id)}}
                    @else
                        {{route('admin.posts.unpublish', $posts[$i]->id)}}
                    @endif"
                          method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn {{$posts[$i]->is_published == 1  ? 'btn-success' : 'btn-danger' }}">
                            @if($posts[$i]->is_published == 1)
                                Publish
                            @else
                                Unpublish
                            @endif
                        </button>
                    </form>
                </td>
{{--                <td>###</td>--}}
            </tr>
        @endfor
        </tbody>
    </table>
@endsection

