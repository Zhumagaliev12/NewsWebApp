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

    <div class="container mt-5">
        <div class="row ">
            <div class="col-lg-8">
                @foreach($posts as $post)
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">{{$post->created_at}}</div>
                            <h2 class="card-title">{{$post->title}}</h2>
                            <p class="card-text">{{$post->content}}</p>
                            <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">Read post</a>
                        </div>
                    </div>
              @endforeach
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-9">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="{{route('posts.index')}}">All posts</a></li>
                                    @foreach($categories as $cat)
                                        <li><a href="{{route('posts.category', $cat->id)}}" >{{$cat->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
    </footer>
</body>
</html>

