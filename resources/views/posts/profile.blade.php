@extends('layouts.app')
@section('content')

    <section style="background-color: #eee;">
        <div class="container py-5">
            {{--            <div class="row">--}}
            {{--                <div class="col">--}}
            {{--                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">--}}
            {{--                        <ol class="breadcrumb mb-0">--}}
            {{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
            {{--                            <li class="breadcrumb-item"><a href="#">User</a></li>--}}
            {{--                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>--}}
            {{--                        </ol>--}}
            {{--                    </nav>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                 alt="avatar"
                                 class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{$user->name}}</h5>
                            {{--                            {{dd($role)}}--}}

                            {{--                            <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>--}}
                            <div class="d-flex justify-content-center mb-2">

                                <a href="{{route('posts.showMyPosts')}}">
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-primary mx-2">
                                        {{__('messages.myPosts')}}
                                    </button>
                                </a>

                                <a href="{{route('posts.showMyComments')}}">
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-primary">
                                        {{__('messages.myComments')}}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{--                    <div class="card mb-4 mb-lg-0">--}}
                    {{--                        <div class="card-body p-0">--}}
                    {{--                            <ul class="list-group list-group-flush rounded-3">--}}
                    {{--                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">--}}
                    {{--                                    <i class="fas fa-globe fa-lg text-warning"></i>--}}
                    {{--                                    <p class="mb-0">https://mdbootstrap.com</p>--}}
                    {{--                                </li>--}}
                    {{--                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">--}}
                    {{--                                    <i class="fab fa-github fa-lg" style="color: #333333;"></i>--}}
                    {{--                                    <p class="mb-0">mdbootstrap</p>--}}
                    {{--                                </li>--}}
                    {{--                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">--}}
                    {{--                                    <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>--}}
                    {{--                                    <p class="mb-0">@mdbootstrap</p>--}}
                    {{--                                </li>--}}
                    {{--                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">--}}
                    {{--                                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>--}}
                    {{--                                    <p class="mb-0">mdbootstrap</p>--}}
                    {{--                                </li>--}}
                    {{--                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">--}}
                    {{--                                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>--}}
                    {{--                                    <p class="mb-0">mdbootstrap</p>--}}
                    {{--                                </li>--}}
                    {{--                            </ul>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>

                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{__('messages.fullName')}}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{  $user->name . ' ' . $user->surname }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{__('messages.email')}}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$user->email}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{__('messages.phone')}}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$user->number}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{__('messages.address')}}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$user->address}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{__('messages.role')}}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$role->{'title_'.app()->getLocale()} }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--                    <div class="row">--}}
                    {{--                        <div class="col-md-6">--}}
                    {{--                            <div class="card mb-4 mb-md-0">--}}
                    {{--                                <div class="card-body">--}}

                    {{--                                    <p class="mb-4"><span class="text-primary font-italic me-1"></span>--}}
                    {{--                                        {{__('messages.posts')}}--}}
                    {{--                                    </p>--}}

                    {{--                                    @foreach($categories as $cat)--}}
                    {{--                                        <p class="mt-4 mb-1" style="font-size: .77rem;">{{$cat->{'title_'.app()->getLocale()} }}</p>--}}
                    {{--                                        <div class="progress rounded" style="height: 5px;">--}}
                    {{--                                            <div class="progress-bar" role="progressbar" style="width: 80%"--}}
                    {{--                                                 aria-valuenow="80"--}}
                    {{--                                                 aria-valuemin="0" aria-valuemax="100"></div>--}}
                    {{--                                        </div>--}}
                    {{--                                    @endforeach--}}




                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="col-md-6">--}}
                    {{--                            <div class="card mb-4 mb-md-0">--}}
                    {{--                                <div class="card-body">--}}
                    {{--                                    <p class="mb-4"><span class="text-primary font-italic me-1"></span>--}}
                    {{--                                        {{__('messages.comments')}}--}}
                    {{--                                    </p>--}}
                    {{--                                    @foreach($categories as $cat)--}}
                    {{--                                        <p class="mt-4 mb-1" style="font-size: .77rem;">{{$cat->{'title_'.app()->getLocale()} }}</p>--}}
                    {{--                                        <div class="progress rounded" style="height: 5px;">--}}
                    {{--                                            <div class="progress-bar" role="progressbar" style="width: 80%"--}}
                    {{--                                                 aria-valuenow="80"--}}
                    {{--                                                 aria-valuemin="0" aria-valuemax="100"></div>--}}
                    {{--                                        </div>--}}
                    {{--                                    @endforeach--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                </div>
            </div>
        </div>
    </section>

@endsection
