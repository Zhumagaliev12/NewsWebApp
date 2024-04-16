@extends('layouts.app')
@section('content')

    <div class="container">
        <h4>{{__('messages.myComments')}}:</h4>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">№</th>
                {{--                <th scope="col">{{__('messages.title')}}</th>--}}
                <th scope="col">{{__('messages.content')}}</th>
                <th scope="col">{{__('messages.author')}}</th>
                <th scope="col">Post Id</th>
                <th scope="col">{{__('messages.createdAt')}}</th>
                {{--                <th scope="col">{{__('messages.createdAt')}}</th>--}}
                                <th scope="col">{{__('messages.action')}}</th>
            </tr>
            </thead>
            <tbody>

{{--            @dd($myComments);--}}

            @for($i=0; $i<count($myComments); $i++)

{{--                @php--}}
{{--                    $usersRated = $myPosts[$i]->usersRated()->get();--}}
{{--                    $sum = 0;--}}
{{--                    $avgRating = 0;--}}
{{--                @endphp--}}
{{--                @for($j=0; $j<count($usersRated); $j++)--}}
{{--                    @php--}}
{{--                        $sum += $usersRated[$j]->pivot->rating;--}}
{{--                    @endphp--}}
{{--                @endfor--}}
{{--                @if(count($usersRated) > 0)--}}
{{--                    @php--}}
{{--                        $avgRating = $sum / count($usersRated);--}}
{{--                    @endphp--}}
{{--                @endif--}}

                <tr>
                    <th scope="row">{{ $i+1 }}</th>
{{--                    <td>{{ $myPosts[$i]->title }}</td>--}}
                    <td>{{ $myComments[$i]->content }}</td>
{{--                       <td> <div style="height: 95px;  overflow: hidden;">--}}
{{--                            class="overflow-auto vh-25"--}}
{{--                            {{ $myComments[$i]->content }}--}}
{{--                        </div>--}}
{{--                    </td>--}}
                    <td>{{ $myComments[$i]->user->name }}</td>
                    <td>{{ $myComments[$i]->post_id }}</td>
{{--                    <td class="{{ $myPosts[$i]->is_published == 1 ? 'bg-warning' : 'bg-success' }}">{{ $myPosts[$i]->is_published == 1 ? 'No' : 'Yes' }}</td>--}}
{{--                    <td>{{ $avgRating == 0 ? 'Not rated' : $avgRating }}</td>--}}
                    <td>{{ $myComments[$i]->created_at }}</td>
                    <td>
                        <a class="nav-link " href="{{route('posts.show', $myComments[$i]->id) }}">
                            <button class="btn btn-success">{{ __('messages.readPost') }}</button>
                        </a>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>

@endsection
