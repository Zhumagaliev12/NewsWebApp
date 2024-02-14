<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <title>Main page</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#!">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('main.index') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('main.about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('main.contact') }}">Contact</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('posts.create') }}">Create post</a></li>
            </ul>
        </div>
    </div>
</nav>
    <div class="container">
    <a href=" {{ route('posts.index') }} " class="btn btn-primary my-3 ">Back</a>   <br><br>
    @yield('content')
    </div>
    <footer class="py-5 bg-dark mt-4">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
    </footer>
</body>
</html>
