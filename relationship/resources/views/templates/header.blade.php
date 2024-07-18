<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relation | Post</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css')}}">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery-1.11.3.min.js')}}"></script>
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>

    <style>
        body{ background-color: black; color: wheat;}
        .dropdown-menu a{ color: white;}
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand" href="{{ url('/')}}">Eloquent</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('one.to.one')}}">One to One</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('one.to.many')}}">One to Many</a>
            </li>
            <li class="nav-item dropdown mr-2">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Posts & Tags
                </a>
                <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item " href="{{route('post.table')}}">Posts</a>
                    <a class="dropdown-item" href="{{route('tag.table')}}" ><button class="btn text-white" disabled> Tags </button> </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('post.to.tags')}}">Post To Tags</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('tag.to.posts')}}"> Tag To Posts</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('many.to.many')}}">Many to Many</a>
            </li>

        </div>
    </nav>

    <div>
        @if (session('success'))
            <div class="col-md-6 alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </div>

</body>
</html>


