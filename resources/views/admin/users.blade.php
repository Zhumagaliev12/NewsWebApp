@extends('layouts.adm')

@section('content')
    <h4>USERS:</h4>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Is Active</th>
            <th scope="col">###</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0; $i<count($users); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$users[$i]->name}}</td>
                <td>{{$users[$i]->email}}</td>
                <td>{{$users[$i]->role->name}}</td>
                <td>
                    <form action="
                    @if($users[$i]->is_active)
                        {{route('admin.users.ban', $users[$i]->id)}}
                    @else
                        {{route('admin.users.unban', $users[$i]->id)}}
                    @endif"
                          method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn {{$users[$i]->is_active  ? 'btn-danger' : 'btn-success' }}">
                            @if($users[$i]->is_active)
                                Ban
                            @else
                                Unban
                            @endif
                        </button>
                    </form>
                </td>
                <td>###</td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection

