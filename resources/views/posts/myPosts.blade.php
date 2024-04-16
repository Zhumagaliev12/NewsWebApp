@extends('layouts.app')
@section('content')

    <div class="container">
        <h4>{{__('messages.myPosts')}}:</h4>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">{{__('messages.title')}}</th>
                <th scope="col">{{__('messages.content')}}</th>
                <th scope="col">{{__('messages.category')}}</th>
                <th scope="col">{{__('messages.isPublished')}}</th>
                <th scope="col">{{__('messages.rating')}}</th>
                <th scope="col">{{__('messages.createdAt')}}</th>
                <th scope="col">{{__('messages.action')}}</th>
            </tr>
            </thead>
            <tbody>
            @for($i=0; $i<count($myPosts); $i++)
                @php
                    $usersRated = $myPosts[$i]->usersRated()->get();
                    $sum = 0;
                    $avgRating = 0;
                @endphp
                @for($j=0; $j<count($usersRated); $j++)
                    @php
                        $sum += $usersRated[$j]->pivot->rating;
                    @endphp
                @endfor
                @if(count($usersRated) > 0)
                    @php
                        $avgRating = $sum / count($usersRated);
                    @endphp
                @endif
                <tr>
                    <th scope="row">{{ $i+1 }}</th>
                    <td>{{ $myPosts[$i]->title }}</td>
                    <td>
                        <div style="height: 95px;  overflow: hidden;">
                            {{--class="overflow-auto vh-25"--}}
                            {{ $myPosts[$i]->content }}
                        </div>
                    </td>
                    <td>{{ $myPosts[$i]->category->title }}</td>
                    <td class="{{ $myPosts[$i]->is_published == 1 ? 'bg-warning' : 'bg-success' }}">{{ $myPosts[$i]->is_published == 1 ? __('messages.no') : __('messages.yes') }} </td>
                    <td>{{ $avgRating == 0 ? 'Not rated' : $avgRating }}</td>
                    <td>{{ $myPosts[$i]->created_at }}</td>
                    <td>
                        <a class="nav-link " href="{{route('posts.show', $myPosts[$i]->id) }}">
                            <button class="btn btn-success">{{ __('messages.readPost') }}</button>
                        </a>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>

@endsection
