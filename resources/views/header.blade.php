<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>

<style>
    nav div a {
        text-decoration: none;
    }
    
    #nav a {
        text-decoration: none;
    }

    nav a:link,
    nav a:visited {
        color: white;
    }

    nav {
    height: 50px;
    }

    nav a:hover {
        color: grey;
    }


</style>

<link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

@if (Auth::check())
<nav id="nav" class="navbar navbar-expand-lg navbar-light bg-dark pt-0 pb-0">
        <div class="container-fluid"> 
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item mt-2 me-2"><a href="/">Home</a></li>
                    <li class="nav-item mt-2 me-2"><a href="/filter?kategori=crime" class="ms-1">Crime</a></li>
                    <li class="nav-item mt-2 me-2"><a href="/filter?kategori=sport" class="ms-1">Sport</a></li>
                    <li class="nav-item mt-2 me-2"><a href="/filter?kategori=lifestyle" class="ms-1">Lifestyle</a></li>
                    <li class="nav-item mt-2 me-2"><a href="/filter?kategori=finance" class="ms-1">Finance</a></li>
                    <li class="nav-item mt-2 me-2"><a href="{{ url('create-article') }}" class="ms-1">Create Article</a></li>
                    <li class="nav-item">
                        <form method="GET" action="/search" class="d-flex pb-0" role="search">
                            <input class="form-control me-2 pt-0 pb-0 pb-0" type="Text" placeholder="Search" name="title" aria-label="Search">
                            <button class="btn btn-outline-success me-2" type="submit">Search</button>
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                <li class="nav-item mt-2 me-2">
                    <a href="{{ url('profile') }}" class="ms-1">{{ Auth::user()->username }}</a>
                </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-outline-danger" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@else
    <nav id="nav" class="navbar navbar-expand-lg navbar-light bg-dark pt-0 pb-0">
        <div class="container-fluid"> 
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item mt-2 me-2"><a href="/">Home</a></li>
                    <li class="nav-item mt-2 me-2"><a href="/filter?kategori=crime" class="ms-1">Crime</a></li>
                    <li class="nav-item mt-2 me-2"><a href="/filter?kategori=sport" class="ms-1">Sport</a></li>
                    <li class="nav-item mt-2 me-2"><a href="/filter?kategori=lifestyle" class="ms-1">Lifestyle</a></li>
                    <li class="nav-item mt-2 me-2"><a href="/filter?kategori=finance" class="ms-1">Finance</a></li>
                    <li class="nav-item">
                        <form method="GET" action="/search" class="d-flex pb-0" role="search">
                            <input class="form-control me-2 pt-0 pb-0 pb-0" type="Text" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success me-2" type="submit">Search</button>
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ url('register') }}" class="nav-link">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('login') }}" class="nav-link">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endif


@yield('content')

@include('footer')