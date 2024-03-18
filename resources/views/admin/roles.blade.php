@extends('layouts.adm')

@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <h4>Roles:</h4>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Title</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0; $i<count($roles); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$roles[$i]->name}}</td>
                <td>
                    <button class="btn btn-danger">Delete</button>
                </td>
                {{--                <td>--}}
                {{--                    <form action="--}}
                {{--                    @if($posts[$i]->is_published == 1)--}}
                {{--                        {{route('admin.posts.publish', $posts[$i]->id)}}--}}
                {{--                    @else--}}
                {{--                        {{route('admin.posts.unpublish', $posts[$i]->id)}}--}}
                {{--                    @endif"--}}
                {{--                          method="POST">--}}
                {{--                        @csrf--}}
                {{--                        @method('PUT')--}}
                {{--                        <button type="submit" class="btn {{$posts[$i]->is_published == 1  ? 'btn-success' : 'btn-danger' }}">--}}
                {{--                            @if($posts[$i]->is_published == 1)--}}
                {{--                                Publish--}}
                {{--                            @else--}}
                {{--                                Unpublish--}}
                {{--                            @endif--}}
                {{--                        </button>--}}
                {{--                    </form>--}}
                {{--                </td>--}}
                {{--                <td>###</td>--}}
            </tr>
        @endfor
        </tbody>

    </table>

    <h4>Create new role</h4>
    <form action="{{route('admin.role.store')}}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Type role...">
        <button class="btn btn-success" type="submit">Add role</button>
    </form>

@endsection

