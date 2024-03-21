@extends('layouts.adm')

@section('content')
    <h4>Comments:</h4>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Autor</th>
            <th scope="col">Email</th>
            <th scope="col">Post id</th>
            <th scope="col">Content</th>
            <th scope="col">Created at</th>
            <th scope="col">###</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0; $i<count($comments); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$comments[$i]->user->name}}</td>
                <td>{{$comments[$i]->user->email}}</td>
                <td>{{$comments[$i]->post_id}}</td>
                <td>{{$comments[$i]->content}}</td>
                <td>{{$comments[$i]->created_at}}</td>
{{--                <td>--}}
{{--                    <form action="--}}
{{--                    @if($users[$i]->is_active)--}}
{{--                        {{route('admin.users.ban', $users[$i]->id)}}--}}
{{--                    @else--}}
{{--                        {{route('admin.users.unban', $users[$i]->id)}}--}}
{{--                    @endif"--}}
{{--                          method="POST">--}}
{{--                        @csrf--}}
{{--                        @method('PUT')--}}
{{--                        <button type="submit" class="btn {{$users[$i]->is_active  ? 'btn-danger' : 'btn-success' }}">--}}
{{--                            @if($users[$i]->is_active)--}}
{{--                                Ban--}}
{{--                            @else--}}
{{--                                Unban--}}
{{--                            @endif--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                </td>--}}
                <td>###</td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection


