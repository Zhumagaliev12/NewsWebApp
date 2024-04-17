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
            <th scope="col">Title Kz</th>
            <th scope="col">Title En</th>
            <th scope="col">Title Ru</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0; $i<count($roles); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$roles[$i]->title_kz}}</td>
                <td>{{$roles[$i]->title_en}}</td>
                <td>{{$roles[$i]->title_ru}}</td>

                <td>
                    <form action="{{route('admin.role.destroy', $roles[$i]->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
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

