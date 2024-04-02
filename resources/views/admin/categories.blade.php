@extends('layouts.adm')

@section('content')

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <h4>CATEGORIES:</h4>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Title_Kz</th>
            <th scope="col">Title_En</th>
            <th scope="col">Title_Ru</th>
            <th scope="col">Code</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0; $i<count($categories); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$categories[$i]->title_kz}}</td>
                <td>{{$categories[$i]->title_en}}</td>
                <td>{{$categories[$i]->title_ru}}</td>
                <td>{{$categories[$i]->code}}</td>
                <td>
                    <form action="{{route('admin.category.destroy', $categories[$i]->id)}}" method="post">
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

    <h4>Create new category</h4>
    <form action="{{route('admin.category.store')}}" method="post">
        @csrf
            Title_Kz:<input type="text" name="title_kz" placeholder="Санатты енгізіңіз..."><br>
            Title_En:<input class="mt-1" type="text" name="title_en" placeholder="Type category..."><br>
            Title_Ru:<input class="mt-1" type="text" name="title_ru" placeholder="Введите категорию..."><br>
            Code:<input class="mt-1" type="text" name="code" placeholder="Type category code..."><br>
            <button class="btn btn-success mt-1" type="submit">Add category</button>

    </form>

@endsection

