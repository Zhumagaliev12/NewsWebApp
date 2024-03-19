@extends('layouts.app')
@section('content')


    <div class="container">
        <h4>POSTS:</h4>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Category</th>
                <th scope="col">Is published</th>
                <th scope="col">Rating</th>
                <th scope="col">Created at</th>
            </tr>
            </thead>
            <tbody>
            @for($i=0; $i<count($myPosts); $i++)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$myPosts[$i]->title}}</td>
                    <td {{--class="overflow-auto vh-25"--}} >{{$myPosts[$i]->content}}</td>
                    <td>{{$myPosts[$i]->category->title}}</td>
                    <td class="{{$myPosts[$i]->is_published == 1 ? 'bg-warning' : 'bg-success'}}">{{$myPosts[$i]->is_published == 1 ? 'No' : 'Yes'}}</td>
                    <td>***</td>

{{--                    $myRating = $postRated->pivot->rating;--}}

                    <td>{{$myPosts[$i]->created_at}}</td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>

@endsection
