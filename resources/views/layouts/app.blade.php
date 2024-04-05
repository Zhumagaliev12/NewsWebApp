<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body >
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light sticky-top shadow-sm" style="background-color: #b6b8bf">
        <div class="container">
            <a class="navbar-brand" href="{{route('posts.index')}}">
                {{ config('app.name', 'Laravel') }}
            </a>
            @auth()
                @foreach(App\Models\Category::all() as $cat)
                    <a class="nav-link mx-2" href="{{route('posts.category', $cat->id)}}">{{$cat->{'title_'.app()->getLocale()} }}</a>
                @endforeach
                @if(Auth::user()->role->title_en == 'Admin')
                    <a class="nav-link mx-2 " href="{{route('admin.users')}}">
                        <button class="btn btn-info">{{ __('messages.admin') }}</button>
                    </a>
                @endif

                {{--                @can('view', auth()->user())--}}
                {{--                @endcan--}}

            @endauth

{{--            <h1>{{app()->getLocale()}}</h1>--}}

            {{--                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
            {{--                    <span class="navbar-toggler-icon"></span>--}}
            {{--                </button>--}}

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @auth()
                        <li class="nav-item"><a class="nav-link active" aria-current="page"
                                                href="{{ route('posts.create') }}">{{ __('messages.createPost') }}</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page"
                                                href="{{route('posts.showMyPosts')}}">{{ __('messages.myPosts') }}</a></li>
                    @endauth

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{config('app.languages')[app()->getLocale()]}}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
{{--                            @dd(config('app.languages'));--}}
                            @foreach(config('app.languages') as $ln => $lang)
                                <a class="dropdown-item" href="{{route('switch.lang', $ln)}}">
                                    {{$lang}}
                                </a>
                            @endforeach
                        </div>
                    </li>

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('messages.register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('messages.logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
